<section class="pt-0">
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-xxl-5 col-lg-7 col-md-8 text-center"
                 data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <h4 class="text-dark-gray fw-700 ls-minus-1px">{{ __('home.podcast.title') }}</h4>
                <p class="text-dark-gray mt-3">{{ __('home.podcast.subtitle') }}</p>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-12">
                <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <li class="grid-sizer"></li>
                    @foreach($podcasts as $podcast)
                    <!-- start podcast item -->
                    <li class="grid-item">
                        <div class="card bg-transparent border-0 h-100">
                            <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                <a href="{{ localized_route('podcast.show', ['podcast' => $podcast->slug]) }}">
                                    @if($podcast->getFirstMedia('featured_image'))
                                        {{ $podcast->getFirstMedia('featured_image')->img()->attributes(['alt' => $podcast->title, 'style' => 'width: 100%; height: 250px; object-fit: cover;']) }}
                                    @else
                                        <img src="https://images.unsplash.com/photo-1478737270239-2f02b77fc618?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=250" alt="{{ $podcast->title }}"/>
                                    @endif
                                    <!-- Podcast play icon overlay -->
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <div class="bg-white rounded-circle p-3 shadow">
                                            <i class="bi bi-play-fill text-base-color fs-4"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                <a href="{{ localized_route('podcast.show', ['podcast' => $podcast->slug]) }}"
                                   class="card-title mb-5px fw-600 text-dark-gray d-block">
                                    {{ $podcast->title }}
                                </a>
                                <p>{{ Str::limit(strip_tags($podcast->content), 100) }}</p>
                                <!-- Podcast duration or date -->
                                <div class="d-flex align-items-center text-muted small">
                                    <i class="bi bi-clock me-2"></i>
                                    <span>{{ $podcast->created_at->format('d.m.Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- end podcast item -->
                    @endforeach
                </ul>
                <div class="text-center mt-5">
                    <a href="{{ localized_route('podcast.index') }}" class="btn btn-large btn-rounded with-rounded btn-base-color btn-box-shadow fw-600">
                        {{ __('home.podcast.cta_label') }}<span class="bg-white text-base-color"><i class="bi bi-arrow-right-short icon-extra-medium"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
