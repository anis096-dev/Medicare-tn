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

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('day', 'like', '%'.$query.'%')
            ->orwhere('time1', 'like', '%'.$query.'%')
            ->orwhere('time2', 'like', '%'.$query.'%');
    }
}
