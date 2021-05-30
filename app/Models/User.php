<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
// implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', 
        'specialty', 
        'gender', 
        'marital_status', 
        'date_of_birth', 
        'tel',
        'Governorate',
        'adresse',
        'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    
     /**
     * The list of user roles
     *
     * @return void
     */
    public static function userRoleList()
    {
        return [
            'admin' => 'Admin',
        ];
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function experiences()
    {
        return $this->belongsTo('App\Models\Experience');
    }

    public function educations()
    {
        return $this->belongsTo('App\Models\Education');
    } 
    
    public function time_settings()
    {
        return $this->belongsTo('App\Models\TimeSetting');
    }
    
    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
    
    /**
     * The list of governorates
     *
     * @return void
     */
    public static function governorates()
    {
        return [
            'Ariana',
            'Béja',
            'Ben Arous',
            'Bizerte',
            'Gabès',
            'Gafsa',
            'Jendouba',
            'Kairouan',
            'Kasserine',
            'Kebili',
            'kef',
            'Mahdia',
            'Manouba',
            'Medenine',
            'Monastir',
            'Nabeul',
            'Sfax',
            'Sidi Bouzid',
            'Siliana',
            'Sousse',
            'Tataouine',
            'Tozeur',
            'Tunis',
            'Zaghouan',
        ];
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('tel', 'like', '%'.$query.'%')
                ->orWhere('specialty', 'like', '%'.$query.'%')
                ->orWhere('Governorate', 'like', '%'.$query.'%')
                ->orWhere('adresse', 'like', '%'.$query.'%')
                ->orWhere('adresse2', 'like', '%'.$query.'%');
    }
}