<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSetting extends Model
{
    use HasFactory;
    protected $table = 'time_settings'; 
    protected $fillable = [
        'user_id',
        'day',
        'time1',
        'time2',
    ];

     /**
     * The list of routes when authenticated
     *
     * @return void
     */
    public static function days()
    {
        return [
            'Monday',
            'Tuesday',
            'Wenesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
