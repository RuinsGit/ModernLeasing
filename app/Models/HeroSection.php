<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'happy_customers',
        'delivered_equipment',
        'international_partners',
        'years_experience'
    ];

    protected $casts = [
        'happy_customers' => 'integer',
        'delivered_equipment' => 'integer',
        'international_partners' => 'integer',
        'years_experience' => 'integer'
    ];

    /**
     * İlk hero section-u əldə et
     */
    public static function getFirst()
    {
        return self::first();
    }

}
