<?php

namespace App\Models;

use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock;
use Filament\Forms\Components\RichEditor\FileAttachmentProviders\SpatieMediaLibraryFileAttachmentProvider;
use Filament\Forms\Components\RichEditor\Models\Concerns\InteractsWithRichContent;
use Filament\Forms\Components\RichEditor\Models\Contracts\HasRichContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RalphJSmit\Laravel\SEO\Schema\ArticleSchema;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Feed\FeedItem;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Spatie\Translatable\HasTranslations;

class Post extends Model implements HasMedia, HasRichContent
{
    use HasFactory;
    use HasSEO;
    use HasTags;
    use HasTranslatableSlug;
    use HasTranslations;
    use InteractsWithMedia;
    use InteractsWithRichContent;
    use Searchable;
    use SoftDeletes;

    public $translatable = ['title', 'content', 'excerpt', 'slug', 'meta'];

    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'featured_image',
        'youtube_url',
        'post_type_id',
        'category_id',
        'user_id',
        'parent_id',
        'form_id',
        'slug',
        'status',
        'is_featured',
        'meta',
    ];

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'content' => 'array',
            'excerpt' => 'array',
            'slug' => 'array',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'meta' => 'array',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Post::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Post::class, 'parent_id');
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    public function ancestors()
    {
        return $this->parent()->with('ancestors');
    }

    /**
     * Scope a query to only include active posts.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include root posts (no parent).
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope a query to only include child posts.
     */
    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        $locale = app()->getLocale();

        return [
            'id' => $this->id,
            'title' => get_translation_with_fallback($this, 'title', $locale),
            'excerpt' => strip_tags(get_translation_with_fallback($this, 'excerpt', $locale) ?? ''),
            'content' => strip_tags(get_translation_with_fallback($this, 'content', $locale) ?? ''),
            'slug' => get_translation_with_fallback($this, 'slug', $locale),
            'status' => $this->status,
            'is_featured' => $this->is_featured,
            'post_type_name' => $this->postType ? get_translation_with_fallback($this->postType, 'name', $locale) : null,
            'category_name' => $this->category ? get_translation_with_fallback($this->category, 'name', $locale) : null,
            'author_name' => $this->user?->name,
            'created_at' => $this->created_at?->timestamp ?? now()->timestamp,
        ];
    }

    /**
     * Determine if the model should be searchable.
     */
    public function shouldBeSearchable(): bool
    {
        return $this->status === 'published';
    }

    public function setUpRichContent(): void
    {
        $this->registerRichContent('content')
            ->fileAttachmentProvider(SpatieMediaLibraryFileAttachmentProvider::make())
            ->mergeTags([
                // category
                'category_name' => fn (): ?string => $this->category ? get_translation_with_fallback($this->category, 'name') : null,
                'category_url' => fn (): ?string => $this->category ? route('category.show', [
                    'slug' => get_translation_with_fallback($this->category, 'slug'),
                ]) : null,

                // post type
                'post_type_name' => fn (): ?string => $this->postType ? get_translation_with_fallback($this->postType, 'name') : null,
                'post_type_url' => fn (): ?string => $this->postType ? route('post-type.show', [
                    'slug' => get_translation_with_fallback($this->postType, 'slug'),
                ]) : null,

                // author
                'author_name' => fn (): ?string => $this->user?->name,
                'author_email' => fn (): ?string => $this->user?->email,

                // post urls
                'post_url' => fn (): string => $this->menu_link,
                'post_title' => fn (): string => get_translation_with_fallback($this, 'title'),

                // media urls
                'featured_image_url' => fn (): ?string => $this->hasMedia('featured_image') ? $this->getFirstMediaUrl('featured_image', 'large') : null,
                'gallery_first_url' => fn (): ?string => $this->getMedia('gallery')->first()?->getUrl(),
                'attachment_first_url' => fn (): ?string => $this->getMedia('attachments')->first()?->getUrl(),
            ])
            ->mergeTagLabels([
                'category_name' => 'Kategori adı',
                'category_url' => 'Kategori bağlantısı',
                'post_type_name' => 'Yazı türü adı',
                'post_type_url' => 'Yazı türü bağlantısı',
                'author_name' => 'Yazar adı',
                'author_email' => 'Yazar e-posta',
                'post_url' => 'Yazı bağlantısı',
                'post_title' => 'Yazı başlığı',
                'featured_image_url' => 'Kapak görseli URL',
                'gallery_first_url' => 'Galeri ilk görsel URL',
                'attachment_first_url' => 'İlk ek dosya URL',
            ])
            ->customBlocks([
                HeroBlock::class,
                CalloutBlock::class,
            ]);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('gallery')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

        $this->addMediaCollection('attachments')
            ->acceptsMimeTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('medium')
            ->width(800)
            ->height(600)
            ->sharpen(10);

        $this->addMediaConversion('large')
            ->width(1200)
            ->height(800)
            ->sharpen(10);
    }

    /**
     * Get dynamic SEO data for this post
     */
    public function getDynamicSEOData(): SEOData
    {
        $locale = app()->getLocale();
        $title = get_translation_with_fallback($this, 'title', $locale);
        $description = get_translation_with_fallback($this, 'excerpt', $locale) ?: get_translation_with_fallback($this, 'content', $locale);
        $slug = get_translation_with_fallback($this, 'slug', $locale);

        // Get featured image URL
        $imageUrl = null;
        if ($this->hasMedia('featured_image')) {
            $imageUrl = $this->getFirstMediaUrl('featured_image', 'large');
        }

        // Get author name
        $authorName = $this->user ? $this->user->name : 'Tarf';

        return new SEOData(
            title: $title,
            description: $description ? strip_tags($description) : null,
            image: $imageUrl,
            author: $authorName,
            url: route('blog.show', $slug),
            published_time: $this->created_at,
            modified_time: $this->updated_at,
            schema: SchemaCollection::make()
                ->addArticle(function (ArticleSchema $article, SEOData $SEOData): ArticleSchema {
                    return $article
                        ->addAuthor($this->user ? $this->user->name : 'Tarf')
                        ->markup(function ($markup) {
                            return $markup
                                ->put('headline', get_translation_with_fallback($this, 'title'))
                                ->put('description', get_translation_with_fallback($this, 'excerpt') ?: strip_tags(get_translation_with_fallback($this, 'content')))
                                ->put('datePublished', $this->created_at->toISOString())
                                ->put('dateModified', $this->updated_at->toISOString())
                                ->put('mainEntityOfPage', [
                                    '@type' => 'WebPage',
                                    '@id' => route('blog.show', get_translation_with_fallback($this, 'slug')),
                                ]);
                        });
                })
        );
    }

    public static function getFeedItems(): \Illuminate\Database\Eloquent\Collection
    {
        return static::query()
            ->where('is_published', true)
            ->where('status', 'published')
            ->latest()
            ->limit(20)
            ->get();
    }

    public function toFeedItem(): FeedItem
    {
        $locale = app()->getLocale();

        return FeedItem::create()
            ->id($this->id)
            ->title(get_translation_with_fallback($this, 'title', $locale))
            ->summary(get_translation_with_fallback($this, 'excerpt', $locale) ?? '')
            ->updated($this->updated_at)
            ->link(route('blog.show', ['locale' => $locale, 'slug' => get_translation_with_fallback($this, 'slug', $locale)]))
            ->authorName($this->user?->name ?? 'Tarf')
            ->authorEmail($this->user?->email ?? 'info@tarfakademi.com');
    }

    public function getMenuLinkAttribute(): string
    {
        try {
            $postTypeName = get_translation_with_fallback($this->postType, 'name');
            $slug = get_translation_with_fallback($this, 'slug');

            // If slug is null or empty, try to generate one or use ID as fallback
            if (empty($slug)) {
                // Try to generate slug from title
                $title = get_translation_with_fallback($this, 'title');
                if (! empty($title)) {
                    $slug = \Str::slug($title);
                } else {
                    // Last resort: use ID
                    $slug = 'post-'.$this->id;
                }
            }

            return match ($postTypeName) {
                'Blog' => localized_route('blog.show', $slug),
                'Video' => localized_route('video.show', $slug),
                'Event', 'Etkinlik' => localized_route('events.show', $slug),
                'Page', 'Sayfa' => localized_route('page.show', $slug),
                'Activity', 'Faaliyet' => localized_route('events.show', $slug), // Faaliyetler de etkinlik sayfasında gösterilsin
                'News', 'Haber' => localized_route('blog.show', $slug), // Haberler blog sayfasında gösterilsin
                'Magazine', 'Dergi' => localized_route('blog.show', $slug), // Dergiler blog sayfasında gösterilsin
                'Project', 'Proje' => localized_route('blog.show', $slug), // Projeler blog sayfasında gösterilsin
                default => localized_route('blog.show', $slug),
            };
        } catch (\Exception $e) {
            // Fallback to home route if there's any error
            return localized_route('home');
        }
    }

    public function getMenuNameAttribute(): string
    {
        return get_translation_with_fallback($this, 'title');
    }

    /**
     * YouTube URL'sinden video ID'sini çıkarır
     */
    public function getYouTubeVideoId(): ?string
    {
        if (! $this->youtube_url) {
            return null;
        }

        $url = $this->youtube_url;

        // Farklı YouTube URL formatlarını destekle
        $patterns = [
            '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/watch\?.*v=([a-zA-Z0-9_-]{11})/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    /**
     * YouTube URL'sini iframe embed kodu haline getirir
     */
    public function getYouTubeEmbedCode($width = '100%', ?int $height = 500): ?string
    {
        $videoId = $this->getYouTubeVideoId();

        if (! $videoId) {
            return null;
        }

        return sprintf(
            '<iframe width="%s" height="%d" src="https://www.youtube.com/embed/%s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            $width,
            $height,
            $videoId
        );
    }

    /**
     * YouTube thumbnail URL'sini döndürür
     */
    public function getYouTubeThumbnailUrl(?string $quality = 'maxresdefault'): ?string
    {
        $videoId = $this->getYouTubeVideoId();

        if (! $videoId) {
            return null;
        }

        return "https://img.youtube.com/vi/{$videoId}/{$quality}.jpg";
    }

    /**
     * Meta alanından değer alır
     */
    public function getMeta(string $key, mixed $default = null): mixed
    {
        return data_get($this->meta, $key, $default);
    }

    /**
     * Meta alanına değer set eder
     */
    public function setMeta(string $key, mixed $value): void
    {
        $meta = $this->meta ?? [];
        data_set($meta, $key, $value);
        $this->meta = $meta;
    }

    /**
     * Post type'a göre meta alanlarını döndürür
     */
    public function getMetaFields(): array
    {
        $postTypeName = get_translation_with_fallback($this->postType, 'name');

        return match ($postTypeName) {
            'Event', 'Etkinlik' => [
                'event_date' => [
                    'type' => 'datetime-local',
                    'label' => 'Etkinlik Tarihi',
                    'required' => true,
                ],
                'location' => [
                    'type' => 'text',
                    'label' => 'Konum',
                    'required' => true,
                ],
                'map_url' => [
                    'type' => 'url',
                    'label' => 'Harita Linki',
                    'required' => false,
                ],
            ],
            default => [],
        };
    }
}
