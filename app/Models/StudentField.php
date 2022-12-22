<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentField extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'saf',
        'fasle',
        'majal'
    ];
}
