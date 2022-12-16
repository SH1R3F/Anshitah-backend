<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khotat extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name', 'file', 'schools'
    ];

    protected $casts = [
        'schools' => 'array'
    ];
}
