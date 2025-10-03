<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'order'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    /**
     * Sıralanmış hero features əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')->get();
    }

    /**
     * Şəkil URL-ini əldə et
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('uploads/hero-features/' . $this->image);
        }
        return null;
    }
}