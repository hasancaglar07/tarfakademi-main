<x-app-layout>
    <x-page-title :title="get_translation_with_fallback($video->postType, 'name')" :subtitle="get_translation_with_fallback($video, 'title')" />

    @if ($video->youtube_url)
        <section class="py-0 px-13 lg-px-4 sm-px-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="position-relative" style="padding-bottom: 45%; height: 0; overflow: hidden; border-radius: 8px;">
                            {!! $video->getYouTubeEmbedCode() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($imageUrl = get_video_image_url($video))
        <section class="py-0 px-13 lg-px-4 sm-px-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="position-relative" style="height: 500px; overflow: hidden; border-radius: 8px;">
                            <img src="{{ $imageUrl }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ get_video_alt_text($video) }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="offset-lg-1 col-md-8 last-paragraph-no-margin text-center text-md-start">
                            <div class="blog-content">
                                {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make(
                                    get_translation_with_fallback($video, 'content') ?: [],
                                )->customBlocks([
                                        \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock::class,
                                        \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock::class,
                                    ])->toHtml() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="half-section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-30px">
                        <div class="tag-cloud col-md-9 text-center text-md-start sm-mb-15px">
                            @if ($video->tags->count() > 0)
                                @foreach ($video->tags as $tag)
                                    <a href="{{ localized_route('video.index', ['tag' => $tag->name]) }}">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="tag-cloud col-md-3 text-uppercase text-center text-md-end">
                            <a class="likes-count fw-500 mx-0" href="#">
                                <i class="fa-regular fa-heart text-red me-10px"></i>
                                <span class="text-dark-gray text-dark-gray-hover">{{ __('messages.video.like') }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 text-center elements-social social-icon-style-04">
                            <x-social-share-links />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <span class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">
                        {{ __('messages.video.you_may_also_like') }}
                    </span>
                    <h4 class="text-dark-gray fw-700 ls-minus-1px mt-2">
                        {{ __('messages.video.related_videos') }}
                    </h4>
                </div>
            </div>

            @if ($relatedVideos->count() > 0)
                <div class="row g-4">
                    @foreach ($relatedVideos as $relatedVideo)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card bg-white border-0 h-100 shadow-sm">
                                <div class="blog-image position-relative overflow-hidden" style="height: 200px;">
                                    <a href="{{ localized_route('video.show', ['video' => get_video_slug($relatedVideo)]) }}">
                                        @php
                                            $imageUrl = get_video_image_url($relatedVideo, 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=430');
                                        @endphp
                                        <img src="{{ $imageUrl }}"
                                             class="w-100 h-100"
                                             style="object-fit: cover;"
                                             alt="{{ get_video_alt_text($relatedVideo) }}" />
                                        <x-video-play-button size="60px" iconSize="24px" />
                                    </a>
                                </div>
                                <div class="card-body p-4">
                                    <a href="{{ localized_route('video.show', ['video' => get_video_slug($relatedVideo)]) }}"
                                       class="card-title mb-3 fw-600 lh-30 text-dark-gray d-block text-decoration-none">
                                        {{ get_translation_with_fallback($relatedVideo, 'title') }}
                                    </a>
                                    <p class="text-muted small mb-0">
                                        {{ Str::limit(strip_tags(get_translation_with_fallback($relatedVideo, 'content') ?: ''), 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="bg-white rounded-3 p-5 shadow-sm">
                        <i class="feather icon-feather-video text-muted" style="font-size: 48px;"></i>
                        <p class="text-muted mt-3 mb-0">{{ __('messages.video.no_related_videos') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
