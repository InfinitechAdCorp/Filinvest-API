<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}
