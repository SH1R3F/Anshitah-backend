<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QiasAdaa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'points' , 'cause'
    ];
}
