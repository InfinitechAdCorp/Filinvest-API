<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;

class Offering extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        "property_id",
        "type",
        "minimum_area",
        "maximum_area",
        "image",
    ];

    public static function booted()
    {
        self::updated(function (Property $record): void {
            $directory = "properties/offerings";

            $key = "image";
            if ($record->wasChanged($key)) {
                Storage::disk('s3')->delete("$directory/" . $record->getOriginal($key));
            }
        });

        self::deleted(function (Property $record): void {
            $directory = "properties/offerings";

            $key = "image";
            Storage::disk('s3')->delete("$directory/" . $record[$key]);
        });
    }
}
