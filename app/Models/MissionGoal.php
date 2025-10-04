<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Aktiv Missiya/Məqsəd elementlərini sıra ilə əldə et
     */
    public static function getActiveMissionGoals()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Bütün Missiya/Məqsəd elementlərini sıra ilə əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Icon class'ını düzgün format
     */
    public function getIconClassAttribute()
    {
        return $this->icon ?: 'fas fa-star';
    }

    /**
     * Şəkil URL-ini əldə et
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('uploads/mission-goals/' . $this->image);
        }
        return null;
    }
}
