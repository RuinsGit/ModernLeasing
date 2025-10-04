<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'value',
        'order',
        'is_active'
    ];

    protected $casts = [
        'value' => 'integer',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Aktiv Statistika elementlərini sıra ilə əldə et
     */
    public static function getActiveStatItems()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Bütün Statistika elementlərini sıra ilə əldə et
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
        return $this->icon ?: 'fas fa-chart-bar';
    }
}
