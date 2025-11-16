<section class="bg-very-light-gray overflow-hidden">
    <div class="container">
        <div class="row align-items-center justify-content-center mb-6 text-center text-lg-start">
            <div class="col-xl-5 col-lg-5 md-mb-20px"
                data-anime='{ "translateX": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <h4 class="text-dark-gray fw-700 mb-0 ls-minus-1px">Etkinlikler</h4>
            </div>
            <div class="col-xl-5 col-lg-5 last-paragraph-no-margin md-mb-30px"
                data-anime='{ "translateX": [-50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <p class="w-90 xl-w-100 md-w-80 sm-w-100 md-mx-auto">

                </p>
            </div>
            <div class="col-xl-2 col-lg-2 d-flex justify-content-center justify-content-lg-end"
                data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <!-- start slider navigation -->
                <div
                    class="slider-one-slide-prev-1 icon-small text-dark-gray swiper-button-prev slider-navigation-style-04 bg-white text-dark-gray box-shadow-large">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <div
                    class="slider-one-slide-next-1 icon-small text-dark-gray swiper-button-next slider-navigation-style-04 bg-white text-dark-gray box-shadow-large">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <!-- end slider navigation -->
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 position-relative">
                <div class="outside-box-right-40 xs-outside-box-right-0"
                    data-anime='{ "translateX": [100, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="swiper magic-cursor"
                        data-slider-options='{ "slidesPerView": 1, "spaceBetween": 28, "loop": true, "autoplay": { "delay": 2000, "disableOnInteraction": false }, "pagination": { "el": ".slider-four-slide-pagination-1", "clickable": true }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 5 }, "992": { "slidesPerView": 4 }, "768": { "slidesPerView": 3 }, "576": { "slidesPerView": 2 } }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            @forelse($events as $index => $event)
                                @php
                                    $eventSlug = get_translation_with_fallback($event, 'slug');
                                @endphp

                                    <!-- start content carousal item -->
                                    <div class="swiper-slide">
                                        <x-event-card :event="$event" :index="$index" />
                                    </div>
                                    <!-- end content carousal item -->

                            @empty
                                <div class="swiper-slide">
                                    <div class="text-center p-5">
                                        <p class="text-muted">{{ __('messages.events.no_events_available') }}</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- start slider pagination -->
                <!--<div class="swiper-pagination slider-four-slide-pagination-1 swiper-pagination-style-2 swiper-pagination-clickable swiper-pagination-bullets"></div>-->
                <!-- end slider pagination -->
            </div>
        </div>
    </div>
</section>
