<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'id',
        'school',
        'report_date',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'report_date',
    ];
}
