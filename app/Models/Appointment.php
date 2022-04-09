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
        'related_email',
        'patient_name',
        'patient_email',
        'patient_tel',
        'treatment',
        'sub_treatment',
        'status',
        'passage_number',
        'certificate',
        'home_mention',
        'start_date',
        'duration',
        'user_dispo',
        'user_dispo2',
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
     * The list of passage_nbr
     *
     * @return void
     */
    public static function duration()
    {
        return [
            '1 day',
            '2 days',
            '3 days',
            '4 days',
            '5 days',
            '6 days',
            '7 days',
            '8 days',
            '9 days',
            '10 days',
            '11 days',
            '12 days',
            '13 days',
            '14 days',
            '15 days',
            '16 days',
            '17 days',
            '18 days',
            '19 days',
            '20 days',
            '21 days',
            '22 days',
            '23 days',
            '24 days',
            '25 days',
            '26 days',
            '27 days',
            '28 days',
            '29 days',
            '30 days',
            '31 days',
            '32 days',
            '33 days',
            '34 days',
            '35 days',
            '36 days',
            '37 days',
            '38 days',
            '39 days',
            '40 days',
            '41 days',
            '42 days',
            '43 days',
            '44 days',
            '45 days',
            '46 days',
            '47 days',
            '48 days',
            '49 days',
            '50 days',
            '51 days',
            '52 days',
            '53 days',
            '54 days',
            '55 days',
            '56 days',
            '57 days',
            '58 days',
            '59 days',
            'more',
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
            'Home',
            'Cabinet',
            'Both',
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('related_name', 'like', '%'.$query.'%')
                        ->Orwhere('patient_name', 'like', '%'.$query.'%')
                        ->Orwhere('patient_email', 'like', '%'.$query.'%')
                        ->Orwhere('patient_tel', 'like', '%'.$query.'%')
                        ->Orwhere('treatment', 'like', '%'.$query.'%')
                        ->Orwhere('status', 'like', '%'.$query.'%')
                        ->Orwhere('care_place', 'like', '%'.$query.'%')
                        ->Orwhere('status', 'like', '%'.$query.'%')
                        ->Orwhere('created_at', 'like', '%'.$query.'%');
    }
    
}