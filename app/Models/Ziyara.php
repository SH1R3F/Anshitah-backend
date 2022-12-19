<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ziyara extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'user_id', 'q1', 'q2', 'q3', 'q4', 'q5'
    ];

    protected $dates = [
        'date', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
