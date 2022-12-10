<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Support extends Model
{
    use HasFactory;

    public static function tickets()
    {
        return DB::table('support_tickets')
        ->join('users', 'users.id', '=', 'support_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'support_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->select('support_tickets.id', 'support_tickets.title', 'support_tickets.status', 'support_tickets.updated_at', 'users.name as username', 'roles.name as rolename')
        ->orderBy('support_tickets.updated_at', 'DESC')
        ->get();
    }

    public static function user_tickets()
    {
        return DB::table('support_tickets')->where('support_tickets.user_id', Auth::user()->id)
        ->join('users', 'users.id', '=', 'support_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'support_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->select('support_tickets.id', 'support_tickets.title', 'support_tickets.status', 'support_tickets.updated_at', 'users.name as username', 'roles.name as rolename')
        ->orderBy('support_tickets.updated_at', 'DESC')
        ->get();
    }

    public static function tickets_inquires()
    {
        return DB::table('inquires_tickets')
        ->join('users', 'users.id', '=', 'inquires_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'inquires_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->select('inquires_tickets.id', 'inquires_tickets.title', 'inquires_tickets.status', 'inquires_tickets.updated_at', 'users.name as username', 'roles.name as rolename')
        ->orderBy('inquires_tickets.updated_at', 'DESC')
        ->get();
    }

    public static function user_tickets_inquires()
    {
        return DB::table('inquires_tickets')->where('inquires_tickets.user_id', Auth::user()->id)
        ->join('users', 'users.id', '=', 'inquires_tickets.user_id')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'inquires_tickets.user_id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->select('inquires_tickets.id', 'inquires_tickets.title', 'inquires_tickets.status', 'inquires_tickets.updated_at', 'users.name as username', 'roles.name as rolename')
        ->orderBy('inquires_tickets.updated_at', 'DESC')
        ->get();
    }
}
