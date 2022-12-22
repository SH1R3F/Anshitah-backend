<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file', 'answer', 'wrong_answer1', 'wrong_answer2', 'wrong_answer3', 'topic', 'mark', 'quiz_id'];

    protected $casts = [
        'mark' => 'integer',
        'quiz_id' => 'integer'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
