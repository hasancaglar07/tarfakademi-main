<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasSEO;
    use HasTranslatableSlug;
    use HasTranslations;
    use SoftDeletes;

    public $translatable = ['name', 'description', 'slug'];

    protected $fillable = [
        'name',
        'description',
        'slug',
        'post_type_id',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'array',
            'description' => 'array',
            'slug' => 'array',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get dynamic SEO data for this category
     */
    public function getDynamicSEOData(): SEOData
    {
        $locale = app()->getLocale();
        $name = $this->getTranslation('name', $locale);
        $description = $this->getTranslation('description', $locale);

        return new SEOData(
            title: $name,
            description: $description ? strip_tags($description) : "Tarf {$name} kategorisindeki tüm içerikler",
            url: route('blog.index', ['category' => $this->id])
        );
    }
}
