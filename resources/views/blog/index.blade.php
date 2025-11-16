<x-app-layout>
    <x-page-title :title="__('messages.blog.page_title')" subtitle="__('messages.blog.page_subtitle')" />
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($posts->count() > 0)
                        <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                            data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>
                            @foreach ($posts as $post)
                                <!-- start blog item -->
                                <li class="grid-item">
                                    <div class="card bg-transparent border-0 h-100">
                                        <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                            <a href="{{ localized_route('blog.show', ['slug' => $post->slug]) }}">
                                                @if ($post->getFirstMedia('featured_image'))
                                                    {{ $post->getFirstMedia('featured_image')->img()->attributes(['alt' => $post->title, 'style' => 'width: 100%; height: 250px; object-fit: cover;']) }}
                                                @else
                                                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=250"
                                                        alt="{{ $post->title }}"
                                                        style="width: 100%; height: 250px; object-fit: cover;">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                            <a href="{{ localized_route('blog.show', ['slug' => $post->slug]) }}"
                                                class="card-title mb-5px fw-600 lh-30 text-dark-gray d-block">
                                                {{ $post->title }}
                                            </a>
                                            <p class="w-95">
                                                {{ Str::limit(strip_tags($post->content), 120) }}
                                            </p>
                                            <div class="d-flex align-items-center mt-3">
                                                <small class="text-muted me-3">
                                                    <i class="feather icon-feather-calendar me-1"></i>
                                                    {{ $post->created_at->format('d.m.Y') }}
                                                </small>
                                                @if ($post->category)
                                                    <small class="text-muted">
                                                        <i class="feather icon-feather-tag me-1"></i>
                                                        {{ $post->category->name }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end blog item -->
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-5">
                            <h3 class="text-dark-gray mb-3">{{ __('messages.blog.no_posts_yet') }}</h3>
                            <p class="text-muted">{{ __('messages.blog.no_posts_message') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            @if ($posts->hasPages())
                <div class="row">
                    <div class="col-12 mt-3 d-flex justify-content-center"
                        data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <!-- start pagination -->
                        {{ $posts->links('pagination::bootstrap-4') }}
                        <!-- end pagination -->
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
