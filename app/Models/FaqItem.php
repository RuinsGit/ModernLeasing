<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'faq_category_id',
        'question',
        'answer', // JSON formatında olacaq
        'order',
        'is_active',
    ];

    protected $casts = [
        'answer' => 'array', // JSON sahəsini array olaraq cast edirik
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Aid olduğu FAQ kateqoriyasını əldə et.
     */
    public function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }

    /**
     * Aktiv FAQ suallarını kateqoriyaya görə sıra ilə əldə et.
     */
    public static function getActiveItemsByCategory(int $categoryId)
    {
        return self::where('is_active', true)
                   ->where('faq_category_id', $categoryId)
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Bütün FAQ suallarını sıra ilə əldə et.
     */
    public static function getOrderedItems()
    {
        return self::orderBy('order')->get();
    }

    /**
     * JSON cavabı üçün HTML render edən helper metodu.
     */
    public function getRenderedAnswerAttribute()
    {
        $html = '';
        if (is_array($this->answer)) {
            foreach ($this->answer as $block) {
                if (!isset($block['type']) || !isset($block['content'])) continue;

                switch ($block['type']) {
                    case 'paragraph':
                        $html .= '<p class="text-light">'. e($block['content']) .'</p>';
                        break;
                    case 'list_ordered':
                        $html .= '<ol class="text-light">';
                        foreach ($block['content'] as $item) {
                            $html .= '<li>'. e($item) .'</li>';
                        }
                        $html .= '</ol>';
                        break;
                    case 'list_unordered':
                        $html .= '<ul class="text-light">';
                        foreach ($block['content'] as $item) {
                            $html .= '<li>'. e($item) .'</li>';
                        }
                        $html .= '</ul>';
                        break;
                    case 'custom_html':
                        $html .= $block['content']; // HTML-i olduğu kimi daxil et
                        break;
                    case 'heading':
                        if (isset($block['level']) && in_array($block['level'], [1, 2, 3, 4, 5, 6])) {
                            $html .= '<h'. $block['level'] .' class="text-primary">'. e($block['content']) .'</h'. $block['level'] .'>';
                        } else {
                            $html .= '<h5 class="text-primary">'. e($block['content']) .'</h5>';
                        }
                        break;
                }
            }
        }
        return $html;
    }
}
