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

    protected $casts = [
        'nadi_3ilmi' => 'array',
        'nadi_taqafi' => 'array',
        'nadi_tafkir' => 'array',
        'nadi_tatawo3' => 'array',
        'nadi_mihani' => 'array',
        'nadi_sport' => 'array',
        'nadi_kachfi' => 'array',
        'nadi_ijtima3i' => 'array',
        'nadi_tadrib' => 'array',
    ];
}
