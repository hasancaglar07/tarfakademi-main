@php
    $locale = app()->getLocale();
    $backgroundImage = $hero?->background_image
        ? Storage::disk('public')->url($hero->background_image)
        : 'https://images.pexels.com/photos/12920871/pexels-photo-12920871.jpeg';

    $title = $hero?->getTranslation('title', $locale) ?? __('home.hero.title');
    $subtitle = $hero?->getTranslation('subtitle', $locale) ?? __('home.hero.subtitle');
    $primaryCtaLabel = $hero?->getTranslation('primary_cta_label', $locale) ?? __('home.hero.primary_cta_label');
    $primaryCtaHref = $hero?->getTranslation('primary_cta_href', $locale) ?? __('home.hero.primary_cta_href');
    $tertiaryCtaLabel = $hero?->getTranslation('tertiary_cta_label', $locale) ?? __('home.hero.tertiary_cta_label');
    $tertiaryCtaHref = $hero?->getTranslation('tertiary_cta_href', $locale) ?? __('home.hero.tertiary_cta_href');
    $stats = $hero?->stats ?? __('home.hero.stats');
@endphp

<!-- start banner -->
<section class="top-space-margin p-0 full-screen md-h-600px sm-h-500px section-dark" data-parallax-background-ratio="0.8" style="background-image: url('{{ $backgroundImage }}')">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-xl-7 col-md-9 col-sm-9 position-relative text-white" data-anime='{ "el": "childs", "opacity": [0, 1], "translateY": [30, 0], "staggervalue": 200, "easing": "easeInOutSine" }'>
                <div class="fs-80 lh-75 sm-fs-65 fw-600 mb-20px text-shadow-large ls-minus-2px">{{ $title }}</div>
                <div>
                    <span class="opacity-5 fs-20 w-70 md-w-85 mb-25px fw-300 d-inline-block">{{ $subtitle }}</span>
                </div>
                <div class="icon-with-text-style-08">
                    <div class="feature-box feature-box-left-icon-middle">
                        <div class="feature-box-icon feature-box-icon-rounded w-65px h-65px rounded-circle bg-yellow me-15px rounded-box">
                            <i class="feather icon-feather-arrow-right text-dark-gray icon-extra-medium"></i>
                        </div>
                        <div class="feature-box-content">
                            <a href="{{ $primaryCtaHref }}" class="d-inline-block fs-19 text-white text-shadow-double-large">{{ $primaryCtaLabel }}</a>
                        </div>
                    </div>
                </div>
                <div class="mt-4">

                    <a href="{{ $tertiaryCtaHref }}" class="btn btn-large btn-rounded with-rounded btn-transparent-white btn-box-shadow fw-600">{{ $tertiaryCtaLabel }}</a>
                </div>
                @if(!empty($stats))
                <div class="row mt-5">
                    @foreach($stats as $stat)
                    <div class="col-md-4 text-center">
                        <div class="fs-40 fw-700 text-white mb-2">{{ $stat['value'] }}</div>
                        <div class="fs-16 text-white opacity-7">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

