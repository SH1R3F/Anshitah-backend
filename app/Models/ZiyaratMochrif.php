<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZiyaratMochrif extends Model
{
    use HasFactory;

    protected $fillable = [
        'school', 'date', 'user_id', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13',
    ];

    protected $casts = [
        'date' => 'date',
        'q1' => 'boolean',
        'q2' => 'boolean',
        'q3' => 'boolean',
        'q4' => 'boolean',
        'q5' => 'boolean',
        'q6' => 'boolean',
        'q7' => 'boolean',
        'q8' => 'boolean',
        'q9' => 'boolean',
        'q10' => 'boolean',
        'q11' => 'boolean',
        'q12' => 'boolean',
        'q13' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
