<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMissionSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
    ];

    public static function getActiveMissionSection()
    {
        return self::first();
    }
}
