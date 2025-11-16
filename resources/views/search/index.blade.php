<x-app-layout>

    <x-page-title
        :title="__('messages.common.search')"
        :subtitle="__('messages.common.search_placeholder')" />

    <!-- start search results section -->
    <section class="wow animate__fadeIn padding-100px-tb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8 col-lg-10">
                    <!-- Search Form -->
                    <div class="text-center mb-5">
                        <form action="{{ localized_route('search') }}" method="GET" class="search-form">
                            <div class="position-relative d-inline-block w-100" style="max-width: 500px;">
                                <input type="text" class="form-control form-control-lg border-2 rounded-pill ps-5"
                                    name="q" value="{{ $query }}"
                                    placeholder="{{ __('messages.common.search_placeholder') }}" autocomplete="off">
                                <i
                                    class="feather icon-feather-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                            </div>
                        </form>
                    </div>

                    @if ($query)
                        <div class="mb-4">
                            <h4 class="text-dark-gray font-weight-600 mb-3">
                                "{{ $query }}" için arama sonuçları
                            </h4>
                            <p class="text-muted">
                                {{ $results->count() }} sonuç bulundu
                            </p>
                        </div>

                        @if ($results->count() > 0)
                            <!-- Search Results -->
                            <div class="row">
                                @foreach ($results as $result)
                                    <div class="col-12 mb-4">
                                        <div class="card border-0 box-shadow-small">
                                            <div class="card-body p-4">
                                                @if ($result instanceof \App\Models\Post)
                                                    <div class="d-flex align-items-start">
                                                        @if ($result->hasMedia('cover_image'))
                                                            <div class="me-3">
                                                                <img src="{{ $result->getFirstMediaUrl('cover_image', 'thumb') }}"
                                                                    alt="{{ get_translation_with_fallback($result, 'title') }}" class="rounded"
                                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                                            </div>
                                                        @elseif($result->hasMedia('featured_image'))
                                                            <div class="me-3">
                                                                <img src="{{ $result->getFirstMediaUrl('featured_image', 'thumb') }}"
                                                                    alt="{{ get_translation_with_fallback($result, 'title') }}" class="rounded"
                                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                                            </div>
                                                        @elseif($result->media && $result->media->count() > 0)
                                                            <div class="me-3">
                                                                <img src="{{ $result->media->first()->getUrl('thumb') }}"
                                                                    alt="{{ get_translation_with_fallback($result, 'title') }}" class="rounded"
                                                                    style="width: 80px; height: 80px; object-fit: cover;">
                                                            </div>
                                                        @endif
                                                        <div class="flex-grow-1">
                                                            <h5 class="card-title mb-2">
                                                                <a href="{{ $result->menu_link }}"
                                                                    class="text-decoration-none text-dark-gray">
                                                                    {{ get_translation_with_fallback($result, 'title') }}
                                                                </a>
                                                            </h5>
                                                            <p class="card-text text-muted mb-2">
                                                                {{ Str::limit(strip_tags(get_translation_with_fallback($result, 'excerpt') ?: get_translation_with_fallback($result, 'content')), 150) }}
                                                            </p>
                                                            <div class="d-flex align-items-center text-muted small">
                                                                <span class="me-3">
                                                                    <i class="feather icon-feather-calendar me-1"></i>
                                                                    {{ $result->created_at->format('d.m.Y') }}
                                                                </span>
                                                                @if ($result->postType)
                                                                    <span class="me-3">
                                                                        <i class="feather icon-feather-file-text me-1"></i>
                                                                        {{ get_translation_with_fallback($result->postType, 'name') }}
                                                                    </span>
                                                                @endif
                                                                @if ($result->category)
                                                                    <span class="me-3">
                                                                        <i class="feather icon-feather-folder me-1"></i>
                                                                        {{ get_translation_with_fallback($result->category, 'name') }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($result instanceof \App\Models\Category)
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <h5 class="card-title mb-2">
                                                                <a href="{{ localized_route('blog.index', ['category' => $result->slug]) }}"
                                                                    class="text-decoration-none text-dark-gray">
                                                                    <i class="feather icon-feather-folder me-2"></i>
                                                                    {{ $result->name }}
                                                                </a>
                                                            </h5>
                                                            @if ($result->description)
                                                                <p class="card-text text-muted mb-2">
                                                                    {{ Str::limit($result->description, 150) }}
                                                                </p>
                                                            @endif
                                                            <div class="d-flex align-items-center text-muted small">
                                                                <span>
                                                                    <i class="feather icon-feather-file-text me-1"></i>
                                                                    Kategori
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <!-- No Results -->
                            <div class="text-center py-5">
                                <i class="feather icon-feather-search text-muted" style="font-size: 4rem;"></i>
                                <h4 class="text-dark-gray font-weight-600 mt-3 mb-2">Sonuç bulunamadı</h4>
                                <p class="text-muted mb-4">
                                    "{{ $query }}" için herhangi bir sonuç bulunamadı. Farklı anahtar kelimeler
                                    deneyebilirsiniz.
                                </p>
                                <a href="{{ localized_route('home') }}" class="btn btn-base-color">
                                    <i class="feather icon-feather-home me-2"></i>Ana Sayfaya Dön
                                </a>
                            </div>
                        @endif
                    @else
                        <!-- Popular Searches -->
                        <div class="text-center py-5">
                            <h4 class="text-dark-gray font-weight-600 mb-4">
                                {{ __('messages.common.popular_searches') }}</h4>
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                <a href="{{ localized_route('search', ['q' => 'yazılım geliştirme']) }}"
                                    class="badge bg-light text-dark px-3 py-2 text-decoration-none">{{ __('messages.common.software_development') }}</a>
                                <a href="{{ localized_route('search', ['q' => 'veri analizi']) }}"
                                    class="badge bg-light text-dark px-3 py-2 text-decoration-none">{{ __('messages.common.data_analysis') }}</a>
                                <a href="{{ localized_route('search', ['q' => 'siber güvenlik']) }}"
                                    class="badge bg-light text-dark px-3 py-2 text-decoration-none">{{ __('messages.common.cybersecurity') }}</a>
                                <a href="{{ localized_route('search', ['q' => 'yapay zeka']) }}"
                                    class="badge bg-light text-dark px-3 py-2 text-decoration-none">Yapay Zeka</a>
                                <a href="{{ localized_route('search', ['q' => 'blockchain']) }}"
                                    class="badge bg-light text-dark px-3 py-2 text-decoration-none">Blockchain</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end search results section -->
</x-app-layout>
