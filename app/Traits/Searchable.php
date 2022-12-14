<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait Searchable
{
    public function scopeSearch($builder, Request $request, $column)
    {
        return $builder
            ->when($request->q, fn ($builder) => $builder->where($column, 'like', "%{$request->q}%"));
    }
}
