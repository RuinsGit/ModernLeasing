<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekday_hours',
        'weekend_hours',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActiveBusinessHours()
    {
        return self::where('is_active', true)->first();
    }
}
