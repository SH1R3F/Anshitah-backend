<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shared extends Model
{
    use HasFactory;

    public function folders(){
        return $this->hasMany(Shared::class);
    }

    public function files(){
        return $this->hasMany(FileShared::class);
    }

    public static function sharedFiles($id){
        return FileShared::join('users' , 'users.id' , '=' , 'file_shareds.user_id')
                          ->join('shareds' , 'shareds.id' , '=' , 'file_shareds.shared_id')
                          ->where('file_shareds.shared_id' , $id)
                          ->get([
                                'file_shareds.id as id' ,
                                'users.name as owner' ,
                                'shareds.name as shared',
                                'file_shareds.name as file' ,
                                'file_shareds.path as path' ,
                                'file_shareds.href as href'
                            ]);
    }

    public static function subshareds($id){
        return Shared::where('user_id',Auth::user()->id)
                     ->where('shared_id',$id)
                     ->get();
    }
}
