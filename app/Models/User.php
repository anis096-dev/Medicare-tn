<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        'isVerified',
        'governorate_id',
        'delegation_id',
        'location_id',
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

    public function Governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function Delegation()
    {
        return $this->belongsTo('App\Models\Delegation');
    }

    public function Location()
    {
        return $this->belongsTo('App\Models\Location');
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

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::Where('tel', 'like', '%'.$query.'%');
    }
    
    public function images(){
        return $this->hasMany(Image::class);
    }
}