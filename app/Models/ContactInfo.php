<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'working_hours_weekdays',
        'working_hours_weekends',
        'map_iframe',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Aktiv Əlaqə Məlumatlarını əldə et
     */
    public static function getActiveContactInfo()
    {
        return self::where('is_active', true)->first();
    }
}
