<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['date', 'name', 'year', 'temperature', 'sugar', 'complaint', 'procedure', 'status'];

    protected $casts = [
        'date' => 'date',
        'temperatiure' => 'float',
        'sugar' => 'float',
        'status' => 'integer'
    ];

    const STATUS_DAILY   = 1;
    const STATUS_CHRONIC = 2;
}
