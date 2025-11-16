@php
    $postTitle = get_translation_with_fallback($post, 'title');
    $postContent = get_translation_with_fallback($post, 'content');
    $postExcerpt = get_translation_with_fallback($post, 'excerpt');
    $postSlug = get_translation_with_fallback($post, 'slug');
    $postTypeName = get_translation_with_fallback($post->postType, 'name');
    $coverImage = $post->getFirstMediaUrl('cover_image');
    $featuredImage = $post->getFirstMediaUrl('featured_image');
    $galleryImages = $post->getMedia('gallery');
@endphp

<x-app-layout>
    <x-page-title :title="$postTypeName" :subtitle="$postTitle" />

    <!-- Hero Image Section -->
    @if ($coverImage || $featuredImage)
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ $coverImage ?: $featuredImage }}"
                             class="w-100"
                             alt="{{ $postTitle }}"
                             loading="lazy">
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Main Content Section -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-content">
                        {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make($postContent ?: [])
                            ->customBlocks([
                                \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock::class,
                                \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock::class,
                            ])->toHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery First Image Section -->
    @if ($galleryImages->count() > 0)
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ $galleryImages->first()->getUrl() }}"
                             class="w-100"
                             alt="{{ $postTitle }}"
                             loading="lazy">
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Excerpt Section -->
    @if ($postExcerpt)
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="pb-35px text-center">
                            <h4 class="text-dark-gray fw-500 w-90 md-w-100 alt-font">
                                {{ $postExcerpt }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Gallery Second Image Section -->
    @if ($galleryImages->count() > 1)
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ $galleryImages->skip(1)->first()->getUrl() }}"
                             class="w-100"
                             alt="{{ $postTitle }}"
                             loading="lazy">
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Tags and Actions Section -->
    <section class="half-section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-30px">
                        <div class="col-12">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="tag-cloud">
                                    @if ($post->tags->count() > 0)
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ localized_route('blog.index', ['tag' => $tag->name]) }}"
                                               class="tag-link">
                                                {{ $tag->name }}
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="text-uppercase">
                                    <a class="likes-count fw-500 mx-0" href="#"
                                       data-post-id="{{ $post->id }}">
                                        <i class="fa-regular fa-heart text-red me-10px"></i>
                                        <span class="text-dark-gray text-dark-gray-hover">{{ __('messages.blog.like') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Author Bio Section -->
                    @if ($post->user)
                        <div class="row">
                            <div class="col-12 mb-6">
                                <div class="d-block d-md-flex w-100 box-shadow-extra-large align-items-center border-radius-4px p-7 sm-p-35px">
                                    <div class="w-140px text-center me-50px sm-mx-auto">
                                        @if ($post->user->profile_photo_path)
                                            <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}"
                                                class="rounded-circle w-120px"
                                                alt="{{ $post->user->name }}"
                                                loading="lazy">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=125&h=125"
                                                class="rounded-circle w-120px"
                                                alt="{{ $post->user->name }}"
                                                loading="lazy">
                                        @endif
                                        <a href="{{ localized_route('blog.index', ['author' => $post->user->id]) }}"
                                            class="text-dark-gray fw-500 mt-20px d-inline-block lh-20">
                                            {{ $post->user->name }}
                                        </a>
                                        <span class="fs-15 lh-20 d-block sm-mb-15px">
                                            {{ __('messages.blog.author') }}
                                        </span>
                                    </div>
                                    <div class="w-75 sm-w-100 text-center text-md-start last-paragraph-no-margin">
                                        @if ($post->user->bio)
                                            <p>{{ $post->user->bio }}</p>
                                        @else
                                            <p>{{ $post->user->name }} hakkında bilgi bulunmuyor.</p>
                                        @endif
                                        <a href="{{ localized_route('blog.index', ['author' => $post->user->id]) }}"
                                            class="btn btn-link btn-large text-dark-gray mt-15px">
                                            {{ __('messages.blog.view_all_posts') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Social Share Section -->
                    <div class="row justify-content-center">
                        <div class="col-12 text-center elements-social social-icon-style-04">
                            <ul class="medium-icon dark">
                                <li>
                                    <a class="facebook"
                                       href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                       target="_blank"
                                       rel="noopener">
                                        <i class="fa-brands fa-facebook-f"></i><span></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="twitter"
                                       href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($postTitle) }}"
                                       target="_blank"
                                       rel="noopener">
                                        <i class="fa-brands fa-twitter"></i><span></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkedin"
                                       href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                                       target="_blank"
                                       rel="noopener">
                                        <i class="fa-brands fa-linkedin-in"></i><span></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="whatsapp"
                                       href="https://wa.me/?text={{ urlencode($postTitle . ' ' . request()->url()) }}"
                                       target="_blank"
                                       rel="noopener">
                                        <i class="fa-brands fa-whatsapp"></i><span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- Related Posts Section -->
    <section class="bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center mb-1">
                <div class="col-lg-7 text-center">
                    <span class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">
                        {{ __('messages.blog.you_may_also_like') }}
                    </span>
                    <h4 class="text-dark-gray fw-700 ls-minus-1px">
                        {{ __('messages.blog.related_posts') }}
                    </h4>
                </div>
            </div>

            @if ($relatedPosts->count() > 0)
                <div class="row g-0">
                    <div class="col-12">
                        <ul class="blog-classic blog-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            @foreach ($relatedPosts as $relatedPost)
                                @php
                                    $relatedPostTitle = get_translation_with_fallback($relatedPost, 'title');
                                    $relatedPostSlug = get_translation_with_fallback($relatedPost, 'slug');
                                    $relatedPostContent = get_translation_with_fallback($relatedPost, 'content');
                                    $relatedPostImage = $relatedPost->getFirstMediaUrl('cover_image') ?: $relatedPost->getFirstMediaUrl('featured_image');
                                @endphp

                                <li class="grid-item">
                                    <div class="card bg-transparent border-0 h-100">
                                        <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                            <a href="{{ localized_route('blog.show', ['slug' => $relatedPostSlug]) }}">
                                                @if ($relatedPostImage)
                                                    <img src="{{ $relatedPostImage }}"
                                                         alt="{{ $relatedPostTitle }}"
                                                         loading="lazy" />
                                                @else
                                                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=430"
                                                         alt="{{ $relatedPostTitle }}"
                                                         loading="lazy" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                            <a href="{{ localized_route('blog.show', ['slug' => $relatedPostSlug]) }}"
                                               class="card-title mb-5px fw-500 lh-30 text-dark-gray d-block">
                                                {{ $relatedPostTitle }}
                                            </a>
                                            <p>{{ Str::limit(strip_tags($relatedPostContent ?: ''), 80) }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">{{ __('messages.blog.no_related_posts') }}</p>
                </div>
            @endif
        </div>
    </section>

    @push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lazy loading for images
            const images = document.querySelectorAll('img[loading="lazy"]');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));

            // Like button functionality
            const likeButton = document.querySelector('.likes-count');
            if (likeButton) {
                likeButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const postId = this.getAttribute('data-post-id');

                    // Toggle like state
                    this.classList.toggle('liked');

                    // Here you can add AJAX call to save like to database
                    // fetch(`/blog/${postId}/like`, {
                    //     method: 'POST',
                    //     headers: {
                    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    //         'Content-Type': 'application/json',
                    //     },
                    // })
                    // .then(response => response.json())
                    // .then(data => {
                    //     // Handle response
                    // });
                });
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add hover effects to author bio card
            const authorBioCard = document.querySelector('.box-shadow-extra-large');
            if (authorBioCard) {
                authorBioCard.classList.add('author-bio-card');
            }

            // Add hover effects to related posts
            const relatedPostsGrid = document.querySelector('.blog-classic.blog-wrapper');
            if (relatedPostsGrid) {
                relatedPostsGrid.classList.add('related-posts-grid');
            }
        });
    </script>
    @endpush
</x-app-layout>
