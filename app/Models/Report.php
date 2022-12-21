<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        "name",
        "number",
        "school",
        "field",
        "value",
        "mocharikin",
        "monadimin",
        "jomhor",
        "total_mocharikin",
        "executed",
        "img1",
        "img2",
        "img3",
        "img4",
    ];

    protected $casts = [
        'executed' => 'array',
        'number' => 'integer',
        'mocharikin' => 'integer',
        'monadimin' => 'integer',
        'jomhor' => 'integer',
        'total_mocharikin' => 'integer',
        'img1' => 'array',
        'img2' => 'array',
        'img3' => 'array',
        'img4' => 'array'
    ];

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }
}
