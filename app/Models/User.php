<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'mobile',
        'rakm_howiya',
        'city',
        'sexe',
        'sana_dirassia',
        'ramz_wizari',
        'school',
        'classes',
        'avatar',
        'milaf_howiya',
        'milaf_wadifi',
        'address',
        'university',
        'takhasos',
        'date_graduation',
        'date_job',
        'current_job',
        'rakm_wadifi',
        'date_birth',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = str_replace('http://localhost:8000/', '', $value);
    }

    public function setMilafWadifiAttribute($value)
    {
        $this->attributes['milaf_wadifi'] = str_replace('http://localhost:8000/', '', $value);
    }

    public function setMilafHowiyaAttribute($value)
    {
        $this->attributes['milaf_howiya'] = str_replace('http://localhost:8000/', '', $value);
    }
}
