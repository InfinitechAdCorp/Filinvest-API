<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Offering extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        "property_id",
        "type",
        "minimum_area",
        "maximum_area",
    ];
}
