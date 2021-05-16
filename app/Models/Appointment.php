<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
   
    //Table Name
    protected $table = 'appointments';
    protected $fillable = [
        'user_id',
        'related_id',
        'related_name',
        'treatment',
        'sub_treatment',
        'status',
        'passage_number',
        'certificate',
        'home_mention',
        'start_date',
        'duration',
        'user_dispo',
        'care_place',
        'covid_symptom',
    ];

    /**
     * The list of passage_nbr
     *
     * @return void
     */
    public static function passage_nbr()
    {
        return [
            'Just once',
            '1 in day',
            '2 in day',
            '3 in day',
            '1 in week',
            '2 in week',
            '3 in week',
            '1 in month',
            '2 in month',
            '3 in month',
        ];
    }

    /**
     * The list of status
     *
     * @return void
     */
    public static function status()
    {
        return [
            'waiting',
            'refused',
            'accepted',
        ];
    }

    /**
     * The list of careplace
     *
     * @return void
     */
    public static function careplace()
    {
        return [
            'home',
            'cabinet',
            'both',
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}