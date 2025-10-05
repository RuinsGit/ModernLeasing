<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon_class',
        'image',
        'stat_number_1',
        'stat_text_1',
        'stat_number_2',
        'stat_text_2',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Şəkil URL-ni əldə etmək üçün accessor
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Aktiv tərəfdaşlıq xüsusiyyətlərini sıra ilə əldə et
     */
    public static function getActiveFeatures()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Bütün tərəfdaşlıq xüsusiyyətlərini sıra ilə əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')
                   ->get();
    }
}
