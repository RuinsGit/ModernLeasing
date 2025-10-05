<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
    ];

    /**
     * Tək tərəfdaşlıq bölməsi məlumatlarını əldə et
     */
    public static function getSectionData()
    {
        return self::first();
    }
}
