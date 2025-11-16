<div class="interactive-banner-style-08">
    <figure
        class="m-0 hover-box overflow-hidden position-relative border-radius-6px">
        <a
            href="{{ localized_route('events.show', ['slug' => $event->slug]) }}">
            @if ($event->getFirstMedia('featured_image'))
                {{ $event->getFirstMedia('featured_image')->img()->attributes(['alt' => get_translation_with_fallback($event, 'title'), 'style' => 'width: 100%; height: 390px; object-fit: cover;']) }}
            @else
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=690"
                    alt="{{ get_translation_with_fallback($event, 'title') }}"
                    class="w-100"
                    style="width: 100%; height: 390px; object-fit: cover;">
            @endif
        </a>

        <!-- Yaklaşan Badge -->
        @if($event->getMeta('event_date') && \Carbon\Carbon::parse($event->getMeta('event_date'))->isFuture())
            <div class="position-absolute top-0 end-0 m-3 z-index-2">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold">
                    <i class="bi bi-clock me-1"></i>
                    Yaklaşan
                </span>
            </div>
        @endif

        <figcaption
            class="d-flex flex-column align-items-start justify-content-center position-absolute left-0px top-0px w-100 h-100 z-index-1 p-14 lg-p-12">
            <a
                href="{{ localized_route('events.show', ['slug' => $event->slug]) }}">
                @php
                    $icons = [
                        'line-icon-Medal-2',
                        'line-icon-Financial',
                        'line-icon-Archery-2',
                        'line-icon-Money-Bag',
                    ];
                    $icon = $icons[$index % count($icons)];
                @endphp
                <i class="{{ $icon }} text-white icon-extra-large"></i>
            </a>
            <div class="mt-auto d-flex w-100 align-items-center">
                <div class="col last-paragraph-no-margin">
                    <a href="{{ localized_route('events.show', [  'slug' => $event->slug]) }}"
                        class="text-white fs-24 lh-28 w-65 xl-w-75 d-block">{{ get_translation_with_fallback($event, 'title') }}</a>
                    @if($event->getMeta('event_date'))
                        <div class="text-white-50 fs-14 mt-2">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ \Carbon\Carbon::parse($event->getMeta('event_date'))->locale('tr')->translatedFormat('d F Y') }}
                        </div>
                    @endif
                </div>
                <a href="{{ localized_route('events.show', [ 'slug' => $event->slug]) }}"
                    class="circle-box bg-yellow w-50px h-50px rounded-circle ms-auto position-relative rounded-box">
                    <i
                        class="bi bi-arrow-right-short absolute-middle-center icon-very-medium lh-0px text-dark-gray"></i>
                </a>
            </div>
            <div
                class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-gray-light-dark-transparent z-index-minus-1 opacity-9">
            </div>
        </figcaption>
    </figure>
</div>
