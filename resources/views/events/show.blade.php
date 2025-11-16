<x-app-layout>

    <x-page-title
        :title="$event->postType->getTranslation('name', app()->getLocale())"
        :subtitle="$event->title"/>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 text-center sm-mb-30px">
                            <div class="pb-20px">
                                @if ($event->user && $event->user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $event->user->profile_photo_path) }}"
                                        class="rounded-circle w-130px mb-20px" alt="{{ $event->user->name }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=150&h=150"
                                        class="rounded-circle w-130px mb-20px"
                                        alt="{{ $event->user->name ?? 'Organizatör' }}">
                                @endif
                                <span class="d-block lh-26">{{ __('messages.events.organizer') }}</span>
                                <a href="#"
                                    class="text-dark-gray alt-font fw-500 text-uppercase">{{ $event->user->name ?? 'Anonim' }}</a>
                            </div>
                            <div class="h-3px w-100 bg-base-color mb-20px"></div>

                        </div>
                        <div class="offset-lg-1 col-md-8 last-paragraph-no-margin text-center text-md-start">
                            <div class="blog-content">
                                {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make(
                                    get_translation_with_fallback($event, 'content') ?: [],
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
    @if ($event->getMedia('gallery')->count() > 0)
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ $event->getMedia('gallery')->first()->getUrl() }}" class="w-100"
                            alt="{{ get_translation_with_fallback($event, 'title') }}">
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    @endif
    <!-- start section -->
    @if (get_translation_with_fallback($event, 'excerpt'))
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 text-center text-lg-end sm-mb-30px">
                                @if ($event->user && $event->user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $event->user->profile_photo_path) }}"
                                        class="mt-10px rounded-circle w-100px" alt="{{ $event->user->name }}">
                                @endif
                            </div>
                            <div class="offset-lg-1 col-md-8 last-paragraph-no-margin text-center text-md-start">
                                <div class="pb-35px text-center text-md-start">
                                    <h4 class="text-dark-gray fw-500 w-90 md-w-100 alt-font">
                                        {{ get_translation_with_fallback($event, 'excerpt') }}</h4>
                                    <span
                                        class="fw-600 text-dark-gray d-block lh-20 text-uppercase ls-minus-05px">{{ $event->user->name ?? 'Anonim' }}</span>
                                    <span
                                        class="d-block text-uppercase fs-13">{{ __('messages.events.organizer') }}</span>
                                </div>
                                <div class="h-3px w-100 bg-dark-gray mb-35px"></div>
                                <div class="blog-content">
                                    {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make(
                                        get_translation_with_fallback($event, 'content') ?: [],
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
    @if ($event->getMedia('gallery')->count() > 1)
        <section class="py-0 ps-13 pe-13 lg-ps-4 lg-pe-4 sm-px-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ $event->getMedia('gallery')->skip(1)->first()->getUrl() }}" class="w-100"
                            alt="{{ get_translation_with_fallback($event, 'title') }}">
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
                            @if ($event->tags->count() > 0)
                                @foreach ($event->tags as $tag)
                                    <a
                                        href="{{ localized_route('events.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif
                        </div>


                    </div>
                    @if ($event->user)
                        <div class="row">
                            <div class="col-12 mb-6">
                                <div
                                    class="d-block d-md-flex w-100 box-shadow-extra-large align-items-center border-radius-4px p-7 sm-p-35px">
                                    <div class="w-140px text-center me-50px sm-mx-auto">
                                        @if ($event->user->profile_photo_path)
                                            <img src="{{ asset('storage/' . $event->user->profile_photo_path) }}"
                                                class="rounded-circle w-120px" alt="{{ $event->user->name }}">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=125&h=125"
                                                class="rounded-circle w-120px" alt="{{ $event->user->name }}">
                                        @endif
                                        <a href="{{ localized_route('events.index', ['organizer' => $event->user->id]) }}"
                                            class="text-dark-gray fw-500 mt-20px d-inline-block lh-20">{{ $event->user->name }}</a>
                                        <span
                                            class="fs-15 lh-20 d-block sm-mb-15px">{{ __('messages.events.organizer') }}</span>
                                    </div>
                                    <div class="w-75 sm-w-100 text-center text-md-start last-paragraph-no-margin">
                                        @if ($event->user->bio)
                                            <p>{{ $event->user->bio }}</p>
                                        @else
                                            <p>{{ $event->user->name }} hakkında bilgi bulunmuyor.</p>
                                        @endif
                                        <a href="{{ localized_route('events.index', ['organizer' => $event->user->id]) }}"
                                            class="btn btn-link btn-large text-dark-gray mt-15px">{{ __('messages.events.view_all_events') }}</a>
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
                        class="d-inline-block text-dark-gray align-middle fw-500 fs-20 ls-minus-05px">{{ __('messages.events.you_may_also_like') }}</span>
                    <h4 class="text-dark-gray fw-700 ls-minus-1px">{{ __('messages.events.related_events') }}</h4>
                </div>
            </div>
            @if ($relatedEvents->count() > 0)
                <div class="row g-0">
                    <div class="col-12">
                        <ul
                            class="blog-classic blog-wrapper grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            @foreach ($relatedEvents as $relatedEvent)
                                <!-- start event item -->
                                <li class="grid-item">
                                    <div class="card bg-transparent border-0 h-100">
                                        <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                            <a
                                                href="{{ localized_route('events.show', ['slug' => get_translation_with_fallback($relatedEvent, 'slug')]) }}">
                                                @if ($relatedEvent->getFirstMediaUrl('cover_image'))
                                                    <img src="{{ $relatedEvent->getFirstMediaUrl('cover_image') }}"
                                                        alt="{{ get_translation_with_fallback($relatedEvent, 'title') }}" />
                                                @elseif($relatedEvent->getFirstMediaUrl('featured_image'))
                                                    <img src="{{ $relatedEvent->getFirstMediaUrl('featured_image') }}"
                                                        alt="{{ get_translation_with_fallback($relatedEvent, 'title') }}" />
                                                @else
                                                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=430"
                                                        alt="{{ get_translation_with_fallback($relatedEvent, 'title') }}" />
                                                @endif
                                            </a>
                                        </div>
                                        <div
                                            class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                            <a href="{{ localized_route('events.show', ['slug' => get_translation_with_fallback($relatedEvent, 'slug')]) }}"
                                                class="card-title mb-5px fw-500 lh-30 text-dark-gray d-block">
                                                {{ get_translation_with_fallback($relatedEvent, 'title') }}
                                            </a>
                                            <p>{{ Str::limit(strip_tags(get_translation_with_fallback($relatedEvent, 'content') ?: ''), 80) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end event item -->
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">{{ __('messages.events.no_related_events') }}</p>
                </div>
            @endif
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
