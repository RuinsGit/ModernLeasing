<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavbarItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'route_name',
        'url',
        'icon',
        'order',
        'is_active',
        'show_desktop',
        'show_mobile'
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
        'show_desktop' => 'boolean',
        'show_mobile' => 'boolean'
    ];

    /**
     * Aktiv navbar elementlərini sıralı şəkildə əldə et
     */
    public static function getActiveItems()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Desktop üçün aktiv elementlər
     */
    public static function getDesktopItems()
    {
        return self::where('is_active', true)
                   ->where('show_desktop', true)
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Mobil üçün aktiv elementlər
     */
    public static function getMobileItems()
    {
        return self::where('is_active', true)
                   ->where('show_mobile', true)
                   ->orderBy('order')
                   ->get();
    }

    /**
     * URL əldə et (route və ya direkt URL)
     */
    public function getUrlAttribute($value)
    {
        if ($this->route_name) {
            try {
                return route($this->route_name);
            } catch (\Exception $e) {
                return $this->attributes['url'] ?? '#';
            }
        }
        
        return $this->attributes['url'] ?? '#';
    }

    /**
     * Raw URL əldə et (edit form üçün)
     */
    public function getUrlRawAttribute()
    {
        return $this->attributes['url'] ?? '';
    }

    /**
     * Route aktiv olub-olmadığını yoxla
     */
    public function isActive()
    {
        if ($this->route_name) {
            return request()->routeIs($this->route_name);
        }
        
        return false;
    }
}