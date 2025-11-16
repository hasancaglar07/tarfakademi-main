<x-app-layout>

    <x-page-title :title="__('messages.video.page_title')" subtitle="__('messages.video.page_subtitle')" />

    <!-- start section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($videos->count() > 0)
                        <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                            data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>
                            @foreach ($videos as $video)
                                <!-- start video item -->
                                <li class="grid-item">
                                    <div class="card bg-transparent border-0 h-100">
                                        <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                            <a href="{{ localized_route('video.show', ['video' => $video->slug]) }}">
                                                @if ($video->getFirstMedia('featured_image'))
                                                    {{ $video->getFirstMedia('featured_image')->img()->attributes(['alt' => $video->title, 'style' => 'width: 100%; height: 250px; object-fit: cover;']) }}
                                                @else
                                                    <img src="https://images.unsplash.com/photo-1611162616475-46b635cb6868?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=250"
                                                        alt="{{ $video->title }}"
                                                        style="width: 100%; height: 250px; object-fit: cover;">
                                                @endif
                                                <!-- Video play button overlay -->
                                                <div class="position-absolute top-50 start-50 translate-middle">
                                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center"
                                                        style="width: 60px; height: 60px; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                                                        <i class="feather icon-feather-play text-dark-gray"
                                                            style="font-size: 24px; margin-left: 3px;"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                            <a href="{{ localized_route('video.show', ['video' => $video->slug]) }}"
                                                class="card-title mb-5px fw-600 lh-30 text-dark-gray d-block">
                                                {{ $video->title }}
                                            </a>
                                            <p class="w-95">
                                                {{ Str::limit(strip_tags($video->content), 120) }}
                                            </p>
                                            <div class="d-flex align-items-center mt-3">
                                                <small class="text-muted me-3">
                                                    <i class="feather icon-feather-calendar me-1"></i>
                                                    {{ $video->created_at->format('d.m.Y') }}
                                                </small>
                                                @if ($video->category)
                                                    <small class="text-muted">
                                                        <i class="feather icon-feather-tag me-1"></i>
                                                        {{ $video->category->name }}
                                                    </small>
                                                @endif
                                            </div>
                                            @if ($video->youtube_url)
                                                <div class="mt-2">
                                                    <small class="text-muted">
                                                        <i class="feather icon-feather-youtube me-1"></i>
                                                        YouTube Video
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <!-- end video item -->
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-5">
                            <h3 class="text-dark-gray mb-3">{{ __('messages.video.no_videos_yet') }}</h3>
                            <p class="text-muted">{{ __('messages.video.no_videos_message') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            @if ($videos->hasPages())
                <div class="row">
                    <div class="col-12 mt-3 d-flex justify-content-center"
                        data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <!-- start pagination -->
                        {{ $videos->links('pagination::bootstrap-4') }}
                        <!-- end pagination -->
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
