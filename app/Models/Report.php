<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

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

    public function evaluation() {
        return $this->hasOne(Evaluation::class);
    }
}
