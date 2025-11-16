<x-app-layout>
    <!-- start page title -->
    <x-page-title
        :title="$service->postType->getTranslation('name', app()->getLocale())"
        :subtitle="$service->getTranslation('title', app()->getLocale())"
    />

    <!-- end page title -->

    @if($rootServices->count() > 0)
    <!-- start tabs section -->
    <section class="bg-very-light-gray py-40px">
        <div class="container">
            <div class="tab-style-08 border-bottom border-color-extra-medium-gray bg-white box-shadow-quadruple-large">
                <div class="overflow-x-auto">
                    <ul class="nav nav-tabs border-0 fw-500 fs-19 text-center d-flex flex-nowrap justify-content-center">
                        @foreach($rootServices as $rootService)
                            @php
                                $currentSlug = $rootService->getTranslation('slug', app()->getLocale());
                                $isActive = $currentSlug === $service->getTranslation('slug', app()->getLocale());
                            @endphp
                            <li class="nav-item flex-shrink-0">
                                <a href="{{ localized_route('services.show', ['slug' => $currentSlug]) }}"
                                   class="nav-link {{ $isActive ? 'active' : '' }} px-4 py-3">
                                    {{ $rootService->getTranslation('title', app()->getLocale()) }}
                                    <span class="tab-border bg-base-color"></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end tabs section -->
    @endif

    <!-- start section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 pe-5 order-2 order-lg-1 lg-pe-3 md-pe-15px"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    @if($childServices->count() > 0)
                    <div class="bg-very-light-gray border-radius-6px p-45px lg-p-25px mb-25px">
                        <span
                            class="fs-20 ls-minus-05px alt-font text-dark-gray fw-600 mb-20px d-inline-block">{{ __('messages.services.other_services') }}</span>
                        <ul class="p-0 m-0 list-style-02">
                            @foreach($childServices as $childService)
                                @php
                                    $childSlug = $childService->getTranslation('slug', app()->getLocale());
                                @endphp
                                <li
                                    class="pb-10px mb-10px border-bottom border-color-transparent-dark {{ $loop->last ? '' : 'border-bottom' }}">
                                    <a
                                        href="{{ localized_route('services.show', ['slug' => $childSlug]) }}">{{ $childService->getTranslation('title', app()->getLocale()) }}</a>
                                    <i
                                        class="feather icon-feather-arrow-right {{ $loop->last ? 'lh-32' : '' }} ms-auto"></i>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="bg-dark-gray border-radius-6px ps-35px pb-25px pt-25px lg-ps-25px mb-25px">
                        <div class="feature-box feature-box-left-icon-middle">
                            <div
                                class="feature-box-icon feature-box-icon-rounded w-65px h-65px me-20px lg-me-15px rounded-circle bg-yellow rounded-box">
                                <i class="bi bi-envelope icon-extra-medium text-white"></i>
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span
                                    class="fs-19 lh-22 mb-5px d-block text-white opacity-6 fw-300">{{ __('messages.services.for_questions') }}</span>
                                <a href="{{ localized_route('contact.index') }}"
                                    class="text-white fs-20 fw-500 lh-22">{{ __('messages.services.contact_us_link') }}</a>
                            </div>
                        </div>
                    </div>
                    @if ($service->category)
                        <div class="bg-very-light-gray border-radius-6px p-40px lg-p-25px md-p-35px">
                            <span
                                class="fs-20 ls-minus-05px alt-font text-dark-gray fw-600 mb-15px d-inline-block">{{ __('messages.services.category') }}</span>
                            <p class="mb-0">
                                <a href="{{ localized_route('services.index') }}"
                                    class="btn btn-small btn-dark-gray btn-round-edge">
                                    {{ $service->category->getTranslation('name', app()->getLocale()) }}
                                </a>
                            </p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-8 order-1 order-lg-2 md-mb-50px"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>

                    @if ($service->hasMedia('featured_image'))
                        <img src="{{ $service->getFirstMediaUrl('featured_image', 'large') }}"
                            class="mb-40px md-mb-30px border-radius-6px w-100"
                            alt="{{ $service->getTranslation('title', app()->getLocale()) }}">
                    @endif

                    <h4 class="text-dark-gray fw-700 ls-minus-1px alt-font mb-20px d-block">
                        {{ $service->getTranslation('title', app()->getLocale()) }}</h4>

                    @if ($service->getTranslation('excerpt', app()->getLocale()))
                        <div class="mb-30px">
                            <p class="fs-19 lh-30">{{ $service->getTranslation('excerpt', app()->getLocale()) }}</p>
                        </div>
                    @endif

                    <div class="service-content mb-40px">
                        {!! $service->getTranslation('content', app()->getLocale()) !!}
                    </div>

                    @if ($service->hasMedia('gallery'))
                        <div class="row row-cols-1 row-cols-md-2 mb-40px">
                            @foreach ($service->getMedia('gallery')->take(4) as $media)
                                <div class="col mb-30px">
                                    <img src="{{ $media->getUrl('medium') }}" class="border-radius-6px w-100"
                                        alt="{{ $service->getTranslation('title', app()->getLocale()) }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($service->tags->count() > 0)
                        <div class="row">
                            <div class="col-12">
                                <div class="tag-cloud">
                                    <span
                                        class="fw-600 text-dark-gray me-10px">{{ __('messages.services.tags') }}</span>
                                    @foreach ($service->tags as $tag)
                                        <a href="{{ localized_route('services.index') }}"
                                            class="badge bg-very-light-gray text-dark-gray me-5px mb-5px">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row align-items-center justify-content-center mt-40px">
                        <div class="col-auto text-center">
                            <div class="lh-28 last-paragraph-no-margin text-dark-gray">
                                <p>{{ __('messages.services.have_questions_short') }} <a
                                        href="#"
                                        class="text-decoration-line-bottom fw-600 text-dark-gray">{{ __('messages.services.contact_immediately') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
