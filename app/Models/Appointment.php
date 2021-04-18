<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments'; 
    protected $fillable = [
        'user_id',
        'related_id',
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
     * The list of routes when authenticated
     *
     * @return void
     */
    public static function period()
    {
        return [
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}