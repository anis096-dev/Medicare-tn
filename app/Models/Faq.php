<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 
        'question', 
        'answer', 
    ];

     /**
     * The list of governorates
     *
     * @return void
     */
    public static function categories()
    {
        return [
            'Account Overview',
            'Subscription Plans',
            'Payment Options',
            'Notification Settings',
            'Profile Preferences',
            'Privacy and Cookies',   
        ];
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('category', 'like', '%'.$query.'%')
            ->orwhere('question', 'like', '%'.$query.'%');
    }
}
