<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public static function booted()
    {
        self::updated(function (News $record): void {
            $directory = "news";
            $key  = "image";

            if ($record->wasChanged($key)) {
                Storage::disk('s3')->delete("$directory/" . $record->getOriginal($key));
            }
        });

        self::deleted(callback: function (News $record): void {
            $directory = "news";
            $key  = "image";

            Storage::disk('s3')->delete("$directory/" . $record[$key]);
        });
    }
}
