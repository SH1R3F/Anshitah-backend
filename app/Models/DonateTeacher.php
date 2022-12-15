<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateTeacher extends Model
{
    use HasFactory, Searchable;

    protected $casts = [
        'updated_at' => 'datetime'
    ];
}
