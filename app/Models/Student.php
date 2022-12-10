<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

    public static function search($q){
        return Student::where('name' , 'LIKE' , "%$q%")
                       ->get();
    }
}
