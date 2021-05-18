<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'slug',
        'sequence',
        'type',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('label', 'like', '%'.$query.'%')
            ->orwhere('type', 'like', '%'.$query.'%');
    }
}
