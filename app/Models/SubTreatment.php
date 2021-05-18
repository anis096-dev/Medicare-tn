<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTreatment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'treatment'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
            ->orwhere('treatment', 'like', '%'.$query.'%');
    }
}
