<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'point', 'teacher_id'];

    protected $casts = [
        'point' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
