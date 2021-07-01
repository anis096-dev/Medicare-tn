<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations'; 
    protected $fillable = [
        'user_id',
        'formation',
        'institute',
        'Date_of_obtaining',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('formation', 'like', '%'.$query.'%')
            ->orwhere('institute', 'like', '%'.$query.'%');
    }
}
