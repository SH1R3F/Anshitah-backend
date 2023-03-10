<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class GroupePermission extends Model
{
    use HasFactory;

    public function permissions(){
        return $this->hasMany(Permission::class,'groupe_id','id');
    }
}
