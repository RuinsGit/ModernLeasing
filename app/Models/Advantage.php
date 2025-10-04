<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
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
     * Aktiv üstünlükləri sıra ilə əldə et
     */
    public static function getActiveAdvantages()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Bütün üstünlükləri sıra ilə əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Üstünlük şəkil URL'i
     */
    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(public_path('uploads/advantages/' . $this->image))) {
            return asset('uploads/advantages/' . $this->image);
        }
        return null;
    }

    /**
     * Icon class'ını düzgün format
     */
    public function getIconClassAttribute()
    {
        return $this->icon ?: 'fas fa-star';
    }
}
