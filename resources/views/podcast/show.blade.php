<x-app-layout>

    <x-page-title
    :title="$podcast->postType->getTranslation('name', app()->getLocale())"
    :subtitle="$podcast->title"/>

    <!-- start section -->
    @if ($podcast->getFirstMediaUrl('cover_image') || $podcast->getFirstMediaUrl('featured_image'))
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @if ($podcast->getFirstMediaUrl('cover_image'))
                            <img src="{{ $podcast->getFirstMediaUrl('cover_image') }}" class="w-100"
                                alt="{{ $podcast->getTranslation('title', app()->getLocale()) ?: $podcast->getTranslation('title', 'tr') ?: $podcast->getTranslation('title', 'en') }}">
                        @else
                            <img src="{{ $podcast->getFirstMediaUrl('featured_image') }}" class="w-100"
                                alt="{{ $podcast->getTranslation('title', app()->getLocale()) ?: $podcast->getTranslation('title', 'tr') ?: $podcast->getTranslation('title', 'en') }}">
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    @endif
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 text-center sm-mb-30px">
                            <div class="pb-20px">
                                @if ($podcast->user && $podcast->user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $podcast->user->profile_photo_path) }}"
                                        class="rounded-circle w-130px mb-20px" alt="{{ $podcast->user->name }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=150&h=150"
                                        class="rounded-circle w-130px mb-20px"
                                        alt="{{ $podcast->user->name ?? 'Yazar' }}">
                                @endif
                                <span class="d-block lh-26">{{ __('messages.podcast.author') }}</span>
                                <a href="#"
                                    class="text-dark-gray alt-font fw-500 text-uppercase">{{ $podcast->user->name ?? 'Anonim' }}</a>
                            </div>
                            <div class="h-3px w-100 bg-base-color mb-20px"></div>
                            <ul class="d-flex list-unstyled justify-content-center">
                                <li><a href="#" class="text-uppercase alt-font fs-13"><i
                                            class="feather icon-feather-heart me-5px icon-small align-middle"></i>{{ __('messages.podcast.like') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offset-lg-1 col-md-8 last-paragraph-no-margin text-center text-md-start">
                            <div class="blog-content">
                                {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make(
                                    $podcast->getTranslation('content', app()->getLocale()) ?:
                                    $podcast->getTranslation('content', 'tr') ?:
                                    $podcast->getTranslation('content', 'en') ?:
                                    [],
                                )->customBlocks([
                                        \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock::class,
                                        \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock::class,
                                    ])->toHtml() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    @if ($podcast->getMedia('gallery')->count() > 0)
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ $podcast->getMedia('gallery')->first()->getUrl() }}" class="w-100"
                            alt="{{ $podcast->getTranslation('title', app()->getLocale()) ?: $podcast->getTranslation('title', 'tr') ?: $podcast->getTranslation('title', 'en') }}">
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    @endif
    <!-- start section -->
    @if (
        $podcast->getTranslation('excerpt', app()->getLocale()) ||
            $podcast->getTranslation('excerpt', 'tr') ||
            $podcast->getTranslation('excerpt', 'en'))
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 text-center text-lg-end sm-mb-30px">
                                @if ($podcast->user && $podcast->user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $podcast->user->profile_photo_path) }}"
                                        class="mt-10px rounded-circle w-100px" alt="{{ $podcast->user->name }}">
                                @endif
                            </div>
                            <div class="offset-lg-1 col-md-8 last-paragraph-no-margin text-center text-md-start">
                                <div class="pb-35px text-center text-md-start">
                                    <h4 class="text-dark-gray fw-500 w-90 md-w-100 alt-font">
                                        {{ $podcast->getTranslation('excerpt', app()->getLocale()) ?: $podcast->getTranslation('excerpt', 'tr') ?: $podcast->getTranslation('excerpt', 'en') }}
                                    </h4>
                                    <span
                                        class="fw-600 text-dark-gray d-block lh-20 text-uppercase ls-minus-05px">{{ $podcast->user->name ?? 'Anonim' }}</span>
                                    <span
                                        class="d-block text-uppercase fs-13">{{ __('messages.podcast.author') }}</span>
                                </div>
                                <div class="h-3px w-100 bg-dark-gray mb-35px"></div>
                                <div class="blog-content">
                                    {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make(
                                        $podcast->getTranslation('content', app()->getLocale()) ?:
                                        $podcast->getTranslation('content', 'tr') ?:
                                        $podcast->getTranslation('content', 'en') ?:
                                        [],
                                    )->customBlocks([
                                            \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock::class,
                                            \App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock::class,
                                        ])->toHtml() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    @endif
    <!-- start section -->
    @if ($podcast->getMedia('gallery')->count() > 1)
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ $podcast->getMedia('gallery')->skip(1)->first()->getUrl() }}" class="w-100"
                            alt="{{ $podcast->getTranslation('title', app()->getLocale()) ?: $podcast->getTranslation('title', 'tr') ?: $podcast->getTranslation('title', 'en') }}">
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    @endif
    <!-- start section -->
    <section class="half-section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-30px">
                        <div class="tag-cloud col-md-9 text-center text-md-start sm-mb-15px">
                            @if ($podcast->tags->count() > 0)
                                @foreach ($podcast->tags as $tag)
                                    <a
                                        href="{{ localized_route('podcast.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif
                        </div>
                        <div class="tag-cloud col-md-3 text-uppercase text-center text-md-end">
                            <a class="likes-count fw-500 mx-0" href="#"><i
                                    class="fa-regular fa-heart text-red me-10px"></i><span
                                    class="text-dark-gray text-dark-gray-hover">{{ __('messages.podcast.like') }}</span></a>
                        </div>
                    </div>
                    @if ($podcast->user)
                        <div class="row">
                            <div class="col-12 mb-6">
                                <div
                                    class="d-block d-md-flex w-100 box-shadow-extra-large align-items-center border-radius-4px p-7 sm-p-35px">
                                    <div class="w-140px text-center me-50px sm-mx-auto">
                                        @if ($podcast->user->profile_photo_path)
                                            <img src="{{ asset('storage/' . $podcast->user->profile_photo_path) }}"
                                                class="rounded-circle w-120px" alt="{{ $podcast->user->name }}">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=125&h=125"
                                                class="rounded-circle w-120px" alt="{{ $podcast->user->name }}">
                                        @endif
                                        <a href="{{ localized_route('podcast.index', ['author' => $podcast->user->id]) }}"
                                            class="text-dark-gray fw-500 mt-20px d-inline-block lh-20">{{ $podcast->user->name }}</a>
                                        <span
                                            class="fs-15 lh-20 d-block sm-mb-15px">{{ __('messages.podcast.author') }}</span>
                                    </div>
                                    <div class="w-75 sm-w-100 text-center text-md-start last-paragraph-no-margin">
                                        @if ($podcast->user->bio)
                                            <p>{{ $podcast->user->bio }}</p>
                                        @else
                                            <p>{{ $podcast->user->name }} hakkında bilgi bulunmuyor.</p>
                                        @endif
                                        <a href="{{ localized_route('podcast.index', ['author' => $podcast->user->id]) }}"
                                            class="btn btn-link btn-large text-dark-gray mt-15px">{{ __('messages.podcast.view_all_podcasts') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-12 text-center elements-social social-icon-style-04">
                            <ul class="medium-icon dark">
                                <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i><span></span></a></li>
                                <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i
                                            class="fa-brands fa-twitter"></i><span></span></a></li>
                                <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i
                                            class="fa-brands fa-instagram"></i><span></span></a></li>
                                <li><a class="linkedin" href="http://www.linkedin.com" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i><span></span></a></li>
                                <li><a class="behance" href="http://www.behance.com/" target="_blank"><i
                                            class="fa-brands fa-behance"></i><span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center mb-1">
                <div class="col-lg-7 text-center">
                    <span
                        class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">{{ __('messages.podcast.you_may_also_like') }}</span>
                    <h4 class="text-dark-gray fw-700 ls-minus-1px">{{ __('messages.podcast.related_podcasts') }}</h4>
                </div>
            </div>
            @if ($relatedPodcasts->count() > 0)
                <div class="row g-0">
                    <div class="col-12">
                        <ul
                            class="blog-classic blog-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            @foreach ($relatedPodcasts as $relatedPodcast)
                                <!-- start podcast item -->
                                <li class="grid-item">
                                    <div class="card bg-transparent border-0 h-100">
                                        <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                            <a
                                                href="{{ localized_route('podcast.show', ['podcast' => $relatedPodcast->getTranslation('slug', app()->getLocale()) ?: $relatedPodcast->getTranslation('slug', 'tr') ?: $relatedPodcast->getTranslation('slug', 'en')]) }}">
                                                @if ($relatedPodcast->getFirstMediaUrl('cover_image'))
                                                    <img src="{{ $relatedPodcast->getFirstMediaUrl('cover_image') }}"
                                                        alt="{{ $relatedPodcast->getTranslation('title', app()->getLocale()) ?: $relatedPodcast->getTranslation('title', 'tr') ?: $relatedPodcast->getTranslation('title', 'en') }}" />
                                                @elseif($relatedPodcast->getFirstMediaUrl('featured_image'))
                                                    <img src="{{ $relatedPodcast->getFirstMediaUrl('featured_image') }}"
                                                        alt="{{ $relatedPodcast->getTranslation('title', app()->getLocale()) ?: $relatedPodcast->getTranslation('title', 'tr') ?: $relatedPodcast->getTranslation('title', 'en') }}" />
                                                @else
                                                    <img src="https://images.unsplash.com/photo-1478737270239-2f02b77fc618?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=430"
                                                        alt="{{ $relatedPodcast->getTranslation('title', app()->getLocale()) ?: $relatedPodcast->getTranslation('title', 'tr') ?: $relatedPodcast->getTranslation('title', 'en') }}" />
                                                @endif
                                                <!-- Podcast play icon overlay -->
                                                <div class="position-absolute top-50 start-50 translate-middle">
                                                    <div
                                                        class="w-60px h-60px bg-yellow rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="feather icon-feather-play text-dark-gray"
                                                            style="font-size: 24px; margin-left: 3px;"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div
                                            class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                            <a href="{{ localized_route('podcast.show', ['podcast' => $relatedPodcast->getTranslation('slug', app()->getLocale()) ?: $relatedPodcast->getTranslation('slug', 'tr') ?: $relatedPodcast->getTranslation('slug', 'en')]) }}"
                                                class="card-title mb-5px fw-500 lh-30 text-dark-gray d-block">
                                                {{ $relatedPodcast->getTranslation('title', app()->getLocale()) ?: $relatedPodcast->getTranslation('title', 'tr') ?: $relatedPodcast->getTranslation('title', 'en') }}
                                            </a>
                                            <p>{{ Str::limit(strip_tags($relatedPodcast->getTranslation('content', app()->getLocale()) ?: $relatedPodcast->getTranslation('content', 'tr') ?: $relatedPodcast->getTranslation('content', 'en') ?: ''), 80) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end podcast item -->
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">{{ __('messages.podcast.no_related_podcasts') }}</p>
                </div>
            @endif
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
