<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherNashat extends Model
{
    use HasFactory;

    protected $fillable = [
        'raid',
        'modir',
        'nadi_3ilmi',
        'nadi_taqafi',
        'nadi_tafkir',
        'nadi_tatawo3',
        'nadi_mihani',
        'nadi_sport',
        'nadi_kachfi',
        'nadi_ijtima3i',
        'nadi_tadrib',
    ];
}
