<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'description',
        'type',
        'image',
    ];

    public static function booted()
    {
        self::updated(function (Blog $record): void {
            $directory = "articles";
            $key  = "image";

            if ($record->wasChanged($key)) {
                Storage::disk('s3')->delete("$directory/" . $record->getOriginal($key));
            }
        });

        self::deleted(function (Blog $record): void {
            $directory = "articles";
            $key  = "image";

            Storage::disk('s3')->delete("$directory/" . $record[$key]);
        });
    }
}
