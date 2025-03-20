<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;

class Type extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'description',
        'images',
    ];

    public static function booted()
    {
        self::updated(function (Type $record): void {
            $directory = "types";
            $key  = "images";

            if ($record->wasChanged($key)) {
                $files = json_decode($record->getOriginal($key));
                foreach ($files as $file) {
                    Storage::disk('s3')->delete("$directory/" . $file);
                }
            }
        });

        self::deleted(function (Type $record): void {
            $directory = "types";
            $key  = "images";

            $files = json_decode($record[$key]);
            foreach ($files as $file) {
                Storage::disk('s3')->delete("$directory/" . $file);
            }
        });
    }
}
