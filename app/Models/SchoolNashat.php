<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolNashat extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'work',
        'task',
    ];
}
