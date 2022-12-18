<?php

namespace App\Models;

use App\Models\Point;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Searchable;

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
        'al_jadwal_dirassi',
        'address',
        'university',
        'takhasos',
        'date_graduation',
        'date_job',
        'current_job',
        'rakm_wadifi',
        'date_birth',
        'field'
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

    public function scopeFilter($builder, Request $request)
    {
        return $builder
            ->when($request->role, fn ($builder) => $builder->where('roles.name', $request->role));
    }

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = $value == 'null' ? NULL : str_replace('http://anshitah.com/anshita/', '', $value);
    }

    public function setMilafWadifiAttribute($value)
    {
        $this->attributes['milaf_wadifi'] = $value == 'null' ? NULL : str_replace('http://anshitah.com/anshita/', '', $value);
    }

    public function setMilafHowiyaAttribute($value)
    {
        $this->attributes['milaf_howiya'] = $value == 'null' ? NULL : str_replace('http://anshitah.com/anshita/', '', $value);
    }
}
