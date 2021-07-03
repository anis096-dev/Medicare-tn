<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = ['specialty', 'name', 'description', 'price_day', 'price_night', 'price_weekend'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
            ->orwhere('specialty', 'like', '%'.$query.'%');
    }
}
