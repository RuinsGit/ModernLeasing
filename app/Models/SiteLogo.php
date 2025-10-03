<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo_image',
        'favicon',
        'show_text',
        'is_active'
    ];

    protected $casts = [
        'show_text' => 'boolean',
        'is_active' => 'boolean'
    ];

    /**
     * Aktiv logo əldə et
     */
    public static function getActiveLogo()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Logo şəkil URL'i əldə et
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo_image) {
            return asset('uploads/logos/' . $this->logo_image);
        }
        return asset('uploads/logos/logo.png'); // Default logo
    }

    /**
     * Favicon URL'i əldə et
     */
    public function getFaviconUrlAttribute()
    {
        if ($this->favicon) {
            return asset('uploads/logos/' . $this->favicon);
        }
        return asset('favicon.ico'); // Default favicon
    }

    /**
     * Logo və ya mətn göstərilməli olub-olmadığını yoxla
     */
    public function shouldShowLogo()
    {
        return !empty($this->logo_image);
    }

    /**
     * Mətn göstərilməli olub-olmadığını yoxla
     */
    public function shouldShowText()
    {
        return $this->show_text;
    }
}