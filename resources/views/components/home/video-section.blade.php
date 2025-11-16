<section class="bg-base-color footer-dark py-5">
    <div class="container">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="text-white fw-bold mb-0" style="font-size: 2.5rem;">{{ __('messages.navigation.video') }}</h2>
                <a href="{{ localized_route('video.index') }}" class="text-white text-decoration-none fw-500">
                    {{ __('messages.video.view_all_videos') }} →
                </a>
            </div>
        </div>

        <!-- Separator Line -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-white" style="height: 2px;"></div>
            </div>
        </div>

        @if($featuredVideo || $videos->count() > 0)
        <div class="row">
            <!-- Main Video Player (Left Side) -->
            <div class="col-lg-8 col-md-7 mb-4">
                @if($featuredVideo)
                    <div class="position-relative">
                        <a href="{{ localized_route('video.show', ['video' => $featuredVideo->slug]) }}" class="d-block">
                            <div class="position-relative overflow-hidden rounded" style="height: 400px;">
                                @if($featuredVideo->getFirstMedia('featured_image'))
                                    {{ $featuredVideo->getFirstMedia('featured_image')->img()->attributes([
                                        'alt' => $featuredVideo->title,
                                        'style' => 'width: 100%; height: 100%; object-fit: cover;'
                                    ]) }}
                                @else
                                    <img src="https://images.unsplash.com/photo-1611162616475-46b635cb6868?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=800&h=400"
                                         alt="{{ $featuredVideo->title }}"
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                @endif

                                <!-- Play Button Overlay -->
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-lg"
                                         style="width: 80px; height: 80px;">
                                        <i class="feather icon-feather-play text-dark-gray" style="font-size: 32px; margin-left: 4px;"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Video Title Overlay -->
                            <div class="position-absolute bottom-0 start-0 p-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.8)); width: 100%;">
                                <div class="d-flex align-items-center">
                                    <div class="bg-base-color me-3" style="width: 4px; height: 40px;"></div>
                                    <h3 class="text-white fw-bold mb-0" style="font-size: 1.4rem; line-height: 1.3;">
                                        {{ $featuredVideo->title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Video List (Right Side) -->
            <div class="col-lg-4 col-md-5">
                <div class="d-flex flex-column gap-3">
                    @foreach($videos as $index => $video)
                        <a href="{{ localized_route('video.show', ['video' => $video->slug]) }}"
                           class="text-decoration-none d-flex align-items-start gap-3 p-3 rounded bg-light-gray-hover"
                           style="transition: background-color 0.3s ease;">

                            <!-- Video Thumbnail -->
                            <div class="position-relative flex-shrink-0" style="width: 120px; height: 80px;">
                                <div class="position-relative overflow-hidden rounded" style="width: 100%; height: 100%;">
                                    @if($video->getFirstMedia('featured_image'))
                                        {{ $video->getFirstMedia('featured_image')->img()->attributes([
                                            'alt' => $video->title,
                                            'style' => 'width: 100%; height: 100%; object-fit: cover;'
                                        ]) }}
                                    @else
                                        <img src="https://images.unsplash.com/photo-1611162616475-46b635cb6868?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=120&h=80"
                                             alt="{{ $video->title }}"
                                             style="width: 100%; height: 100%; object-fit: cover;">
                                    @endif

                                    <!-- Small Play Button -->
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                             style="width: 30px; height: 30px;">
                                            <i class="feather icon-feather-play text-dark-gray" style="font-size: 14px; margin-left: 1px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Video Info -->
                            <div class="flex-grow-1">
                                <h6 class="text-white fw-600 mb-2" style="font-size: 0.9rem; line-height: 1.3;">
                                    {{ Str::limit($video->title, 60) }}
                                </h6>
                                <div class="text-white-50" style="font-size: 0.8rem;">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>{{ $video->created_at->format('d F Y') }}</span>
                                        <span>|</span>
                                        <span>{{ $video->user->name ?? 'TARF' }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <!-- No Videos State -->
        <div class="row">
            <div class="col-12 text-center py-5">
                <h4 class="text-white mb-3">{{ __('messages.video.no_videos_yet') }}</h4>
                <p class="text-white-50">{{ __('messages.video.no_videos_message') }}</p>
            </div>
        </div>
        @endif
    </div>
</section>

<style>
.bg-dark-blue {
    background-color: #1a237e !important;
}

.bg-light-blue {
    background-color: #64b5f6 !important;
}

.text-light-blue {
    color: #64b5f6 !important;
}

.text-white-50 {
    color: rgba(255, 255, 255, 0.5) !important;
}

.bg-dark-blue-hover:hover {
    background-color: rgba(255, 255, 255, 0.05) !important;
}

.bg-dark-blue-hover {
    background-color: transparent;
}
</style>
