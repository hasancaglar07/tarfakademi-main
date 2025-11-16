<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hero extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
        'subtitle',
        'primary_cta_label',
        'primary_cta_href',
        'tertiary_cta_label',
        'tertiary_cta_href',
    ];

    protected $fillable = [
        'background_image',
        'title',
        'subtitle',
        'primary_cta_label',
        'primary_cta_href',
        'tertiary_cta_label',
        'tertiary_cta_href',
        'stats',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'stats' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
