<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMissionCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon_class',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    public static function getActiveCards()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->get();
    }
}
