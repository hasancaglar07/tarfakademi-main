<section class="bg-gradient-gray-light-dark-transparent py-16 lg-py-20 position-relative overflow-hidden">
    <!-- Background Image -->
    <div class="position-absolute left-0px top-0px w-100 h-100 z-index-minus-1">
        <img src="https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg"
             alt="TARF Future Vision"
             class="w-100 h-100"
             style="object-fit: cover;">
        <div class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-gray-light-dark-transparent opacity-8"></div>
    </div>

    <div class="container position-relative z-index-1">
        <div class="row justify-content-center text-center">
            <div class="col-xl-8 col-lg-10"
                 data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "easing": "easeOutQuad" }'>

                <!-- Main Title -->
                <h2 class="fw-700 text-white ls-minus-1px mb-4 fs-48 lg-fs-56">
                    {{ __('home.future_contribution.title') }}
                </h2>

                <!-- Subtitle -->
                <h3 class="fw-600 text-white mb-6 fs-24 lg-fs-32 lh-36">
                    {{ __('home.future_contribution.subtitle') }}
                </h3>

                <!-- CTA Button -->
                <a href="{{ __('home.future_contribution.cta_href') }}"
                   class="btn btn-large btn-rounded with-rounded btn-white btn-box-shadow fw-600">
                    {{ __('home.future_contribution.cta_label') }}
                    <span class="bg-base-color text-white">
                        <i class="bi bi-arrow-right-short icon-extra-medium"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
