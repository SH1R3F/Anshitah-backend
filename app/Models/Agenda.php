<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_begin',
        'date_end',
    ];

    protected $dates = [
        'date_begin',
        'date_end',
    ];
}
