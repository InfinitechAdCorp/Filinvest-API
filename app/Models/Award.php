<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;

class Award extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public static function booted()
    {
        self::updated(function (Award $record): void {
            $directory = "awards";
            $key  = "image";

            if ($record->wasChanged($key)) {
                Storage::disk('s3')->delete("$directory/" . $record->getOriginal($key));
            }
        });

        self::deleted(function (Award $record): void {
            $directory = "awards";
            $key  = "image";

            Storage::disk('s3')->delete("$directory/" . $record[$key]);
        });
    }
}
