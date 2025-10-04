<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_description',
        'about_title',
        'about_subtitle',
        'about_image',
        'logo_image',
        'favicon',
        'show_text',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Aktiv sayt loqosunu əldə et
     */
    public static function getActiveLogo()
    {
        return self::where('is_active', true)->first() ?? self::first();
    }

    /**
     * Loqo şəkli URL-ini əldə et
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo_image) {
            return asset('uploads/logos/' . $this->logo_image);
        }
        return null;
    }

    /**
     * Favicon URL-ini əldə et
     */
    public function getFaviconUrlAttribute()
    {
        if ($this->favicon) {
            return asset('uploads/logos/' . $this->favicon);
        }
        return null;
    }

    /**
     * About Image URL-ini əldə et
     */
    public function getAboutImageUrlAttribute()
    {
        if ($this->about_image) {
            return asset('uploads/about_images/' . $this->about_image);
        }
        return null;
    }

    /**
     * Navbar'da loqo göstərilməlidirmi?
     */
    public function shouldShowLogo()
    {
        return $this->logo_image !== null;
    }

    /**
     * Navbar'da mətn göstərilməlidirmi?
     */
    public function shouldShowText()
    {
        return $this->show_text;
    }
}