<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialfooter extends Model
{
    protected $table = 'social_footer';
    
    protected $fillable = [
        'image',
        'icon_class',
        'link',
        'order',
        'is_active' // 'status' yerinə 'is_active' istifadə olunur
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Aktiv sosial footer elementlərini sıra ilə əldə et
     */
    public static function getActiveSocialfooters()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Bütün sosial footer elementlərini sıra ilə əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Sosial media şəkil URL-ini əldə et
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('uploads/socialfooters/' . $this->image);
        }
        return null;
    }

    /**
     * Göstəriləcək ikonu (şəkil və ya class) qaytarır
     */
    public function getDisplayIconAttribute()
    {
        if ($this->image) {
            return '<img src="' . $this->image_url . '" alt="Social Media">';
        } elseif ($this->icon_class) {
            return '<i class="' . $this->icon_class . '"></i>';
        }
        return ''; // Heç nə yoxdursa boş string
    }
}