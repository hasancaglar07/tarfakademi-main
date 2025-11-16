<x-app-layout> <!-- start page title -->

    <x-page-title :title="__('messages.services.page_title')" subtitle="__('messages.services.page_subtitle')" />

    <!-- start section -->
    <section class="pt-0">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center"
                    data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div
                        class="d-inline-block align-middle bg-yellow fw-600 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-12 me-10px lh-30 sm-m-5px">
                        {{ __('messages.services.have_questions') }}</div>
                    <div class="d-inline-block align-middle text-dark-gray fs-19 fw-600 ls-minus-05px">{{ __('messages.services.we_are_ready') }}
                        {{ __('messages.services.contact_info') }}
                        <a href="#"
                            class="text-decoration-line-bottom text-dark-gray">{{ __('messages.services.contact_form') }}</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-xl-7 col-lg-8 col-md-9 text-center"
                    data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h3 class="fw-700 text-dark-gray ls-minus-2px sm-ls-minus-1px">{{ __('messages.services.multi_program_desc') }}</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 justify-content-center"
                data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                @forelse($services as $index => $service)
                <!-- start features box item -->
                <div class="col icon-with-text-style-07 transition-inner-all mb-30px">
                    <div
                        class="bg-white h-100 justify-content-end box-shadow-quadruple-large-hover feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        @if($service->hasMedia('featured_image'))
                        <div class="feature-box-icon">
                            <a href="{{ localized_route('services.show', [ 'slug' => $service->getTranslation('slug', app()->getLocale())]) }}">
                                <img src="{{ $service->getFirstMediaUrl('featured_image', 'thumb') }}" class="h-95px" alt="{{ $service->getTranslation('title', app()->getLocale()) }}">
                            </a>
                        </div>
                        @endif
                        <div class="feature-box-content">
                            <a href="{{ localized_route('services.show', [ 'slug' => $service->getTranslation('slug', app()->getLocale())]) }}"
                                class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">{{ $service->getTranslation('title', app()->getLocale()) }}</a>
                            <p class="mb-30px">{{ $service->getTranslation('excerpt', app()->getLocale()) }}</p>
                        </div>
                        @if($service->is_featured)
                        <span
                            class="position-absolute box-shadow-large top-25px lg-top-15px right-25px lg-right-15px bg-base-color border-radius-18px text-white fs-11 fw-600 text-uppercase ps-15px pe-15px lh-26 ls-minus-05px">{{ __('messages.services.featured_badge') }}</span>
                        @endif
                    </div>
                </div>
                <!-- end features box item -->
                @empty
                <!-- start empty state cards -->
                <div class="col icon-with-text-style-07 transition-inner-all mb-30px">
                    <div class="bg-white h-100 justify-content-end box-shadow-quadruple-large-hover feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        <div class="feature-box-icon">
                            <div class="bg-very-light-gray d-flex align-items-center justify-content-center h-95px border-radius-8px">
                                <i class="bi bi-plus-circle text-muted fs-24"></i>
                            </div>
                        </div>
                        <div class="feature-box-content">
                            <div class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">{{ __('messages.services.no_services_yet') }}</div>
                            <p class="mb-30px text-muted">Yakında yeni hizmetlerimiz eklenecek.</p>
                        </div>
                    </div>
                </div>
                <div class="col icon-with-text-style-07 transition-inner-all mb-30px">
                    <div class="bg-white h-100 justify-content-end box-shadow-quadruple-large-hover feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        <div class="feature-box-icon">
                            <div class="bg-very-light-gray d-flex align-items-center justify-content-center h-95px border-radius-8px">
                                <i class="bi bi-gear text-muted fs-24"></i>
                            </div>
                        </div>
                        <div class="feature-box-content">
                            <div class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Geliştirme Aşamasında</div>
                            <p class="mb-30px text-muted">Yeni programlarımızı hazırlıyoruz.</p>
                        </div>
                    </div>
                </div>
                <div class="col icon-with-text-style-07 transition-inner-all mb-30px">
                    <div class="bg-white h-100 justify-content-end box-shadow-quadruple-large-hover feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        <div class="feature-box-icon">
                            <div class="bg-very-light-gray d-flex align-items-center justify-content-center h-95px border-radius-8px">
                                <i class="bi bi-clock text-muted fs-24"></i>
                            </div>
                        </div>
                        <div class="feature-box-content">
                            <div class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Yakında</div>
                            <p class="mb-30px text-muted">Yeni eğitim programları geliyor.</p>
                        </div>
                    </div>
                </div>
                <div class="col icon-with-text-style-07 transition-inner-all mb-30px">
                    <div class="bg-white h-100 justify-content-end box-shadow-quadruple-large-hover feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        <div class="feature-box-icon">
                            <div class="bg-very-light-gray d-flex align-items-center justify-content-center h-95px border-radius-8px">
                                <i class="bi bi-star text-muted fs-24"></i>
                            </div>
                        </div>
                        <div class="feature-box-content">
                            <div class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Özel Programlar</div>
                            <p class="mb-30px text-muted">Size özel tasarlanmış programlar hazırlanıyor.</p>
                        </div>
                    </div>
                </div>
                <!-- end empty state cards -->
                @endforelse
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 md-mb-50px"
                    data-anime='{ "effect": "slide", "color": "#005153", "direction":"rl", "easing": "easeOutQuad", "delay":50}'>
                    <figure class="position-relative m-0 md-w-90">
                        <img src="https://plus.unsplash.com/premium_photo-1670953513765-4e7fc9893ebe?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=927" class="w-90 border-radius-6px" alt="Tarf">
                    </figure>
                </div>
                <div class="col-lg-5 offset-lg-1"
                    data-anime='{ "el": "childs", "translateX": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="mb-20px md-mb-15px">
                        <div
                            class="separator-line-1px w-50px bg-base-color d-inline-block align-middle me-10px opacity-2">
                        </div>
                        <span class="d-inline-block text-dark-gray align-middle fw-500 fs-20">{{ __('messages.services.faq_section_title') }}</span>
                    </div>
                    <h3 class="fw-700 text-dark-gray ls-minus-2px sm-ls-minus-1px w-90 lg-w-100">{{ __('messages.services.faq_section_subtitle') }}</h3>
                    <div class="accordion accordion-style-02 w-90 lg-w-100" id="accordion-style-02"
                        data-active-icon="fa-chevron-up" data-inactive-icon="fa-chevron-down">
                        <!-- start accordion item -->
                        <div class="accordion-item">
                            <div class="accordion-header border-bottom border-color-transparent-dark-very-light">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-01"
                                    aria-expanded="true" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="fa-solid fa-chevron-down fs-15"></i><span
                                            class="fs-19 fw-600 ls-minus-05px">{{ __('messages.services.what_is_tarf') }}</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-01" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-style-02">
                                <div
                                    class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent-dark-very-light">
                                    <p>{{ __('messages.services.what_is_tarf_answer') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="accordion-item active-accordion">
                            <div class="accordion-header border-bottom border-color-transparent-dark-very-light">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-02"
                                    aria-expanded="false" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="fa-solid fa-chevron-up fs-15"></i><span
                                            class="fs-19 fw-600 ls-minus-05px">{{ __('messages.services.who_can_join') }}</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-02" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-style-02">
                                <div
                                    class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent-dark-very-light">
                                    <p>{{ __('messages.services.who_can_join_answer') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="accordion-item">
                            <div class="accordion-header border-bottom border-color-transparent">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-03"
                                    aria-expanded="false" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="fa-solid fa-chevron-down fs-15"></i><span
                                            class="fs-19 fw-600 ls-minus-05px">{{ __('messages.services.are_programs_paid') }}</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-03" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-style-02">
                                <div
                                    class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent">
                                    <p>{{ __('messages.services.are_programs_paid_answer') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-6 sm-mt-4">
                <!-- start features box item -->
                <div class="col-auto icon-with-text-style-08 md-mb-15px"
                    data-anime='{ "translateX": [-50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="feature-box feature-box-left-icon-middle">
                        <div class="feature-box-icon me-10px">
                            <i class="bi bi-chat-square-text icon-extra-medium text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font text-dark-gray fw-500 fs-19">{{ __('messages.services.certificate_question') }} <a
                                    href="#"
                                    class="text-decoration-line-bottom text-dark-gray fw-600">{{ __('messages.services.certificate_answer') }}</a></span>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col-auto icon-with-text-style-08"
                    data-anime='{ "translateX": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="feature-box feature-box-left-icon-middle">
                        <div class="feature-box-icon me-10px">
                            <i class="bi bi-briefcase icon-extra-medium text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font text-dark-gray fw-500 fs-19">{{ __('messages.services.how_to_apply') }} <a
                                    href="#"
                                    class="text-decoration-line-bottom text-dark-gray fw-600">{{ __('messages.services.how_to_apply_answer') }}</a></span>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
            </div>
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
