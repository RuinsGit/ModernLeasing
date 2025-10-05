<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    /**
     * Bu kateqoriyaya aid FAQ suallarını əldə et.
     */
    public function faqItems()
    {
        return $this->hasMany(FaqItem::class, 'faq_category_id')->orderBy('order');
    }

    /**
     * Aktiv FAQ kateqoriyalarını sıra ilə əldə et.
     */
    public static function getActiveCategories()
    {
        return self::where('is_active', true)->orderBy('order')->get();
    }

    /**
     * Bütün FAQ kateqoriyalarını sıra ilə əldə et.
     */
    public static function getOrderedCategories()
    {
        return self::orderBy('order')->get();
    }
}
