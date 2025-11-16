<section>
    <div class="container">
        <div class="row justify-content-center mb-7 md-mb-4">
            <div class="col-xl-5 col-lg-6 col-md-12 md-mb-50px sm-mb-40px text-center text-lg-start">
                <h4 class="fw-700 mb-0 text-dark-gray ls-minus-1px"
                    data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                    {{ __('home.vision.eyebrow') }}</h4>
                <h3 class="fw-700 text-dark-gray ls-minus-1px mt-20px mb-20px"
                   data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                    {{ __('home.vision.title') }}</h3>
                <p class="text-dark-gray fs-18 lh-28"
                   data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                    {{ __('home.vision.body') }}</p>
            </div>
            <div class="col-lg-6 offset-xl-1 text-center text-lg-start">
                <div class="row align-items-center justify-content-center justify-content-lg-start">
                    @foreach(__('home.vision.pillars') as $pillar)
                    <!-- start pillar item -->
                    <div class="col-sm-6 last-paragraph-no-margin counter-style-04 md-mb-35px">
                        <h4 class="fw-700 text-dark-gray ls-minus-1px mb-10px"
                            data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>{{ $pillar['title'] }}</h4>
                        <p class="w-90 sm-w-100 md-mx-auto"
                           data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutQuad" }'>
                            {{ $pillar['desc'] }}</p>
                    </div>
                    <!-- end pillar item -->
                    @endforeach
                </div>
            </div>
        </div>
        <x-home.testimonials />
    </div>
</section>
