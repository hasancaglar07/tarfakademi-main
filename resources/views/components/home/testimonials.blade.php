@if($testimonials->count() > 0)
<div
    class="row m-0 align-items-center justify-content-center border border-color-extra-medium-gray border-radius-100px md-border-radius-6px ps-10px pe-10px box-shadow-quadruple-large"
    data-anime='{ "scale": [1.1, 1], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
    <div class="col-lg-10">
        <div class="swiper slider-one-slide testimonials-style-09"
             data-slider-options='{ "slidesPerView": 1, "loop": true, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                <!-- start text slider item -->
                <div class="swiper-slide">
                    <div class="row align-items-center pt-25px pb-25px">
                        <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                            @if($testimonial->featured_image)
                                <img src="{{ asset('storage/' . $testimonial->featured_image) }}"
                                     class="rounded-circle w-100px h-100px md-mb-35px" alt="{{ $testimonial->title['tr'] ?? '' }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=200&h=200"
                                     class="rounded-circle w-100px h-100px md-mb-35px" alt="{{ $testimonial->title['tr'] ?? '' }}">
                            @endif
                            <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative">
                                <img src="{{ asset('images/demo-accounting-home-quote-img.png') }}"
                                     class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto"
                                     alt="">
                                {{ $testimonial->excerpt['tr'] ?? $testimonial->content['tr'] ?? '' }}
                            </span>
                        </div>
                        <div class="col-lg-1 d-none d-lg-inline-block">
                            <div class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto"></div>
                        </div>
                        <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                            <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">{{ $testimonial->title['tr'] ?? '' }}</span>
                            <div>{{ $testimonial->category->name['tr'] ?? '' }}</div>
                        </div>
                    </div>
                </div>
                <!-- end text slider item -->
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-2 md-mb-25px">
        <div class="d-flex justify-content-center">
            <!-- start slider navigation -->
            <div class="slider-one-slide-prev-1 swiper-button-prev slider-navigation-style-04 bg-very-light-gray">
                <i class="fa-solid fa-arrow-left icon-small text-dark-gray"></i>
            </div>
            <div class="slider-one-slide-next-1 swiper-button-next slider-navigation-style-04 bg-very-light-gray">
                <i class="fa-solid fa-arrow-right icon-small text-dark-gray"></i>
            </div>
            <!-- end slider navigation -->
        </div>
    </div>
</div>
@endif
