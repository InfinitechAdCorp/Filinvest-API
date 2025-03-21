<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        "name",
        "type",
        "minimum_price",
        "maximum_price",
        "location",
        "minimum_area",
        "maximum_area",
        "status",
        "description",
        "logo",
        "images",
        "amenities",
    ];

    public static function booted()
    {
        self::updated(function (Property $record): void {
            $directory = "properties/logos";
            $key = "logo";

            if ($record->wasChanged($key)) {
                Storage::disk('s3')->delete("$directory/" . $record->getOriginal($key));
            }

            $directory = "properties/images";
            $key  = "images";

            if ($record->wasChanged($key)) {
                $files = json_decode($record->getOriginal($key));
                foreach ($files as $file) {
                    Storage::disk('s3')->delete("$directory/" . $file);
                }
            }
        });

        self::deleted(function (Property $record): void {
            $directory = "properties/logos";
            $key = "logo";

            Storage::disk('s3')->delete("$directory/" . $record[$key]);

            $directory = "properties/images";
            $key  = "images";

            $files = json_decode($record[$key]);
            foreach ($files as $file) {
                Storage::disk('s3')->delete("$directory/" . $file);
            }
        });
    }
}
