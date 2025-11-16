<x-app-layout>
     <x-page-title :title="__('messages.events.page_title')" subtitle="__('messages.events.page_subtitle')" />

    <!-- start section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($events->count() > 0)
                        <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large"
                            data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>
                            @foreach ($events as $event)
                                @php
                                    $eventSlug = get_translation_with_fallback($event, 'slug');
                                    $eventTitle = get_translation_with_fallback($event, 'title');
                                @endphp
                                <!-- start event item -->
                                <li class="grid-item">
                                    <div class="card bg-transparent border-0 h-100">
                                        <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                            <a href="{{ localized_route('events.show', ['slug' => $eventSlug]) }}">
                                                @if ($event->getFirstMedia('featured_image'))
                                                    {{ $event->getFirstMedia('featured_image')->img()->attributes(['alt' => $eventTitle, 'style' => 'width: 100%; height: 250px; object-fit: cover;']) }}
                                                @else
                                                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=250" alt="{{ $eventTitle }}"
                                                        style="width: 100%; height: 250px; object-fit: cover;">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="card-body px-0 pt-30px pb-30px xs-pb-15px last-paragraph-no-margin">
                                            <a href="{{ localized_route('events.show', ['slug' => $eventSlug]) }}"
                                                class="card-title mb-5px fw-600 lh-30 text-dark-gray d-block">
                                                {{ $eventTitle }}
                                            </a>
                                            <p class="w-95">
                                                {{ Str::limit(strip_tags(get_translation_with_fallback($event, 'content')), 120) }}
                                            </p>
                                            <div class="d-flex align-items-center mt-3">
                                                <small class="text-muted me-3">
                                                    <i class="feather icon-feather-calendar me-1"></i>
                                                    {{ $event->created_at->format('d.m.Y') }}
                                                </small>
                                                @if ($event->category)
                                                    <small class="text-muted">
                                                        <i class="feather icon-feather-tag me-1"></i>
                                                        {{ get_translation_with_fallback($event->category, 'name') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end event item -->
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-5">
                            <h3 class="text-dark-gray mb-3">{{ __('messages.events.no_events_yet') }}</h3>
                            <p class="text-muted">{{ __('messages.events.no_events_message') }}</p>
                        </div>
                    @endif
                </div>
            </div>
            @if ($events->hasPages())
                <div class="row">
                    <div class="col-12 mt-3 d-flex justify-content-center"
                        data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <!-- start pagination -->
                        {{ $events->links('pagination::bootstrap-4') }}
                        <!-- end pagination -->
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- end section -->
</x-app-layout>
