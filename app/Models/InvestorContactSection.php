<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorContactSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
        'email',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Aktiv investor əlaqə bölməsi məlumatlarını əldə et
     */
    public static function getSectionData()
    {
        return self::where('is_active', true)->first();
    }
}
