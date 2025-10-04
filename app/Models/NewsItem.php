<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'news_date',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'news_date' => 'date',
    ];

    public static function getActiveNewsItems()
    {
        return self::where('is_active', true)
                   ->orderBy('news_date', 'desc')
                   ->orderBy('order')
                   ->get();
    }
}
