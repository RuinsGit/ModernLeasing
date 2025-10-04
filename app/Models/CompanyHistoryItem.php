<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyHistoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'description',
        'icon_class',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Aktiv şirkət tarixi elementlərini sıra ilə əldə et
     */
    public static function getActiveHistoryItems()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->orderBy('year')
                   ->get();
    }

    /**
     * Bütün şirkət tarixi elementlərini sıra ilə əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')
                   ->orderBy('year')
                   ->get();
    }

    /**
     * İkon classını əldə et (əgər yoxdursa default)
     */
    public function getIconClassAttribute($value)
    {
        return $value ?: 'fas fa-circle'; // Default ikon
    }
}
