<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon_class',
        'benefits',
        'order',
        'is_active',
    ];

    protected $casts = [
        'benefits' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Aktiv tərəfdaşlıq növlərini sıra ilə əldə et
     */
    public static function getActiveTypes()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Bütün tərəfdaşlıq növlərini sıra ilə əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')
                   ->get();
    }

    /**
     * İkon classını əldə et (əgər yoxdursa default)
     */
    public function getIconClassAttribute($value)
    {
        return $value ?: 'fas fa-question-circle'; // Default ikon
    }
}
