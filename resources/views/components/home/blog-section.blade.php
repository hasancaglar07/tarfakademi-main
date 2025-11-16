<section class="pt-0">
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-xxl-5 col-lg-7 col-md-8 text-center"
                 data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <h4 class="text-dark-gray fw-700 ls-minus-1px">{{ __('home.blog.title') }}</h4>
                <p class="text-dark-gray mt-3">{{ __('home.blog.subtitle') }}</p>
            </div>
        </div>

        <!-- Blog Kategorileri Tabs -->
        <div class="row justify-content-center mb-4">
            <div class="col-12">
                <div class="text-center">
                    <ul class="nav nav-pills justify-content-center flex-wrap" id="blogTabs" role="tablist">
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link active px-3 py-2 blog-tab-btn" id="all-tab" data-bs-toggle="pill" data-bs-target="#all-posts" type="button" role="tab" aria-controls="all-posts" aria-selected="true">
                                Tümü
                            </button>
                        </li>
                        @foreach($blogCategories as $category)
                        <li class="nav-item mb-2 mx-2" role="presentation">
                            <button class="nav-link px-3 py-2 blog-tab-btn" id="category-{{ $category->id }}-tab" data-bs-toggle="pill" data-bs-target="#category-{{ $category->id }}-posts" type="button" role="tab" aria-controls="category-{{ $category->id }}-posts" aria-selected="false">
                                {{ get_translation_with_fallback($category, 'name') }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row g-0">
            <div class="col-12">
                <div class="tab-content" id="blogTabsContent">
                    <!-- Tüm Postlar Tab -->
                    <div class="tab-pane fade show active" id="all-posts" role="tabpanel" aria-labelledby="all-tab">
                        <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                            data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>
                            @foreach($posts as $post)
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="{{ localized_route('blog.show', ['slug' => $post->slug]) }}">
                                            @if($post->getFirstMedia('featured_image'))
                                                {{ $post->getFirstMedia('featured_image')->img()->attributes(['alt' => get_translation_with_fallback($post, 'title'), 'style' => 'width: 100%; height: 250px; object-fit: cover;']) }}
                                            @else
                                                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=250" alt="{{ get_translation_with_fallback($post, 'title') }}"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                        <a href="{{ localized_route('blog.show', ['slug' => $post->slug]) }}"
                                           class="card-title mb-5px fw-600 text-dark-gray d-block">
                                            {{ get_translation_with_fallback($post, 'title') }}
                                        </a>
                                        <p>{{ Str::limit(strip_tags(get_translation_with_fallback($post, 'content')), 100) }}</p>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            @endforeach
                        </ul>
                    </div>

                    <!-- Kategori Postları Tabs -->
                    @foreach($blogCategories as $category)
                    <div class="tab-pane fade" id="category-{{ $category->id }}-posts" role="tabpanel" aria-labelledby="category-{{ $category->id }}-tab">
                        <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                            data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>
                            @foreach($category->posts as $post)
                            <!-- start blog item -->
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="{{ localized_route('blog.show', ['slug' => $post->slug]) }}">
                                            @if($post->getFirstMedia('featured_image'))
                                                {{ $post->getFirstMedia('featured_image')->img()->attributes(['alt' => get_translation_with_fallback($post, 'title'), 'style' => 'width: 100%; height: 250px; object-fit: cover;']) }}
                                            @else
                                                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=250" alt="{{ get_translation_with_fallback($post, 'title') }}"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                        <a href="{{ localized_route('blog.show', ['slug' => $post->slug]) }}"
                                           class="card-title mb-5px fw-600 text-dark-gray d-block">
                                            {{ get_translation_with_fallback($post, 'title') }}
                                        </a>
                                        <p>{{ Str::limit(strip_tags(get_translation_with_fallback($post, 'content')), 100) }}</p>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="{{ localized_route('blog.index') }}" class="btn btn-large btn-rounded with-rounded btn-base-color btn-box-shadow fw-600">
                        {{ __('home.blog.cta_label') }}<span class="bg-white text-base-color"><i class="bi bi-arrow-right-short icon-extra-medium"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
