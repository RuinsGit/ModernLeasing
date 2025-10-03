<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'features',
        'order',
        'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * Aktiv xidmətləri sıra ilə əldə et
     */
    public static function getActiveServices()
    {
        return self::where('is_active', true)
                   ->orderBy('order', 'asc')
                   ->orderBy('id', 'asc')
                   ->get();
    }

    /**
     * Sıralı xidmətləri əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order', 'asc')
                   ->orderBy('id', 'asc')
                   ->get();
    }

    /**
     * Xidmət şəkil URL'i əldə et
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('uploads/services/' . $this->image);
        }
        return asset('uploads/services/default-service.jpg'); // Default şəkil
    }

    /**
     * Xidmət aktiv olub-olmadığını yoxla
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * Xidmət xüsusiyyətlərini array olaraq əldə et
     */
    public function getFeaturesListAttribute()
    {
        if (is_string($this->features)) {
            return json_decode($this->features, true) ?? [];
        }
        return $this->features ?? [];
    }

    /**
     * Icon class'ını əldə et
     */
    public function getIconClassAttribute()
    {
        // Əgər icon FontAwesome class'ı deyilsə, default ver
        if (strpos($this->icon, 'fa') === 0 || strpos($this->icon, 'fas') === 0 || strpos($this->icon, 'far') === 0) {
            return $this->icon;
        }
        return 'fas fa-' . $this->icon;
    }
}