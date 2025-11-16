<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Schema\FaqPageSchema;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasSEO;
    use HasTranslations;
    use SoftDeletes;

    public $translatable = ['question', 'answer'];

    protected $fillable = [
        'question',
        'answer',
        'status',
        'user_id',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'question' => 'array',
            'answer' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get dynamic SEO data for this FAQ
     */
    public function getDynamicSEOData(): SEOData
    {
        $locale = app()->getLocale();
        $question = get_translation_with_fallback($this, 'question', $locale);
        $answer = get_translation_with_fallback($this, 'answer', $locale);

        return new SEOData(
            title: $question,
            description: $answer ? strip_tags($answer) : "Tarf SSS - {$question}",
            schema: SchemaCollection::make()
                ->addFaqPage(function (FaqPageSchema $faqPage, SEOData $SEOData): FaqPageSchema {
                    return $faqPage
                        ->addQuestion(
                            name: get_translation_with_fallback($this, 'question'),
                            acceptedAnswer: strip_tags(get_translation_with_fallback($this, 'answer'))
                        );
                })
        );
    }
}
