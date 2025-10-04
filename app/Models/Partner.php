<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Aktiv Tərəfdaş elementlərini sıra ilə əldə et
     */
    public static function getActivePartners()
    {
        return self::where('is_active', true)
                   ->orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Bütün Tərəfdaş elementlərini sıra ilə əldə et
     */
    public static function getOrdered()
    {
        return self::orderBy('order')
                   ->orderBy('created_at')
                   ->get();
    }

    /**
     * Loqo URL-ini əldə et
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('uploads/partners/' . $this->logo);
        }
        return null;
    }
}
