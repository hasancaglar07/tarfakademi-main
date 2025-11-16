<x-app-layout>
    <x-page-title :title="__('messages.faq.page_title')" subtitle="__('messages.faq.page_subtitle')" />

    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 col-md-8 col-sm-9 text-center"
                    data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h3 class="text-dark-gray fw-700 ls-minus-2px">{{ __('messages.frequently_asked_questions') }}</h3>
                    <p class="mb-0">{{ __('messages.faq_description') }}</p>
                </div>
            </div>
            @if ($faqs->count() > 0)
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="accordion accordion-style-02" id="accordion-faq" data-active-icon="fa-chevron-up"
                            data-inactive-icon="fa-chevron-down"
                            data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 900, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            @foreach ($faqs as $index => $faq)
                                <!-- start accordion item -->
                                <div class="accordion-item {{ $index === 0 ? 'active-accordion' : '' }}">
                                    <div
                                        class="accordion-header border-bottom border-color-transparent-dark-very-light">
                                        <a href="#" data-bs-toggle="collapse"
                                            data-bs-target="#accordion-faq-{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            data-bs-parent="#accordion-faq">
                                            <div class="accordion-title mb-0 position-relative text-dark-gray">
                                                <i
                                                    class="fa-solid {{ $index === 0 ? 'fa-chevron-up' : 'fa-chevron-down' }} fs-15"></i>
                                                <span class="fs-19 fw-600 ls-minus-05px">{{ $faq->question }}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div id="accordion-faq-{{ $index }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        data-bs-parent="#accordion-faq">
                                        <div
                                            class="accordion-body last-paragraph-no-margin border-bottom {{ $index === $faqs->count() - 1 ? 'border-color-transparent' : 'border-color-transparent-dark-very-light' }}">
                                            <p>{!! $faq->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end accordion item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center py-5">
                        <h3 class="text-dark-gray mb-3">{{ __('messages.no_faq_yet') }}</h3>
                        <p class="text-muted">{{ __('messages.no_faq_message') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0 bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center align-items-center"
                data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col-lg-6 text-center text-lg-start md-mb-30px">
                    <h4 class="text-dark-gray fw-700 ls-minus-2px mb-0">{{ __('messages.still_have_questions') }}</h4>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <a href="#"
                        class="btn btn-large btn-rounded with-rounded btn-base-color btn-round-edge btn-box-shadow">
                        {{ __('messages.contact_us') }}
                        <span class="bg-orient-blue text-white">
                            <i class="feather icon-feather-arrow-right icon-small"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
