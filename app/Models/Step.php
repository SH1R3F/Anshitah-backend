<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'quiz_id',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
