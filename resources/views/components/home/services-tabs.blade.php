<section class="bg-very-light-gray pt-12 pb-12" id="services"> <!-- pb-0'ı pb-12 yaptım, altta boşluk bırakmak için -->

    <div class="container">
        <!-- Mobil Swipe Container -->
        <div class="mobile-swipe-container d-block d-md-none">
            <div class="swiper mobile-swipe-wrapper">
                <div class="swiper-wrapper">
                    @foreach($tabs as $key => $tab)
                    <div class="swiper-slide mobile-swipe-slide">
                        <!-- Modern Service Card -->
                        <div class="mobile-service-card">
                            <div class="card-image-container position-relative">
                                @if(isset($tab['youtube_url']) && $tab['youtube_url'])
                                    <div class="position-relative w-100 border-radius-top-6px overflow-hidden" style="padding-top: 56.25%;"> <!-- 16:9 aspect ratio -->
                                        <iframe
                                            src="{{ $tab['youtube_url'] }}?rel=0&modestbranding=1&showinfo=0"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen
                                            class="position-absolute top-0 start-0 w-100 h-100">
                                        </iframe>
                                    </div>
                                @elseif(isset($tab['image']) && $tab['image'])
                                    <img src="{{ $tab['image'] }}" alt="{{ $tab['label'] }}" class="w-100">
                                @else
                                    <img src="{{ asset('img/service-tabs/' . $loop->index . '.jpg') }}" alt="{{ $tab['label'] }}" class="w-100">
                                @endif

                                <!-- Sadece ilk slaytta görünecek zarif kaydırma ipucu -->
                                @if($loop->first)
                                <div class="swipe-hint-overlay-modern">
                                    <div class="swipe-hint-content">
                                        <i class="bi bi-arrow-left-right swipe-hint-icon"></i>
                                        <span class="swipe-hint-text">{{ __('home.services_tabs.swipe_hint') }}</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h3 class="text-dark-gray fw-700 fs-22 ls-minus-05px mb-15px">{{ $tab['label'] }}</h3>
                                <p class="text-medium-gray ls-minus-05px text-justify">{{ Str::limit($tab['lead'], 120) }}</p>
                                <a href="{{ $tab['cta'] }}" class="btn btn-large btn-rounded with-rounded btn-white btn-box-shadow fw-600 mt-15px">{{ __('home.services_tabs.tabs.cta') }}<span class="bg-base-color text-white"><i class="bi bi-arrow-right-short icon-extra-medium"></i></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Modern Pagination (Dots) -->
                <div class="swiper-pagination mobile-swipe-indicators"></div>

                <!-- Autoplay Progress Bar -->
                <div class="swiper-autoplay-progress">
                    <svg viewBox="0 0 48 48">
                        <circle cx="24" cy="24" r="20"></circle>
                    </svg>
                    <span></span>
                </div>
            </div>
        </div>

        <!-- Desktop Tab Content (Mevcut haliyle bırakıldı, zaten çalışıyor) -->
        <div class="d-none d-md-block">
            <div class="row mb-8 sm-mb-5">
                <div class="col-12 tab-style-08">
                    <div class="tab-content">
                        @foreach($tabs as $key => $tab)
                        <div class="tab-pane fade in {{ $loop->first ? 'active show' : '' }}" id="tab_{{ $key }}">
                            <div class="row align-items-center justify-content-center g-lg-0">
                                <div class="col-lg-6 col-md-6 sm-mb-30px position-relative overflow-hidden" style="min-height: 400px;">
                                    @if(isset($tab['youtube_url']) && $tab['youtube_url'])
                                        <div class="position-relative w-100 border-radius-6px overflow-hidden" style="height: 400px;">
                                            <iframe src="{{ $tab['youtube_url'] }}?rel=0&modestbranding=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="position-absolute top-0 start-0 w-100 h-100 border-radius-6px"></iframe>
                                        </div>
                                    @elseif(isset($tab['image']) && $tab['image'])
                                        <img src="{{ $tab['image'] }}" alt="{{ $tab['label'] }}" class="w-100 border-radius-6px" style="height: 400px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('img/service-tabs/' . $loop->index . '.jpg') }}" alt="{{ $tab['label'] }}" class="w-100 border-radius-6px" style="height: 400px; object-fit: cover;">
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-5 offset-lg-1 col-md-6 text-center text-md-start" style="min-height: 400px;">
                                    <h3 class="d-inline-block text-dark-gray align-middle fw-700 fs-22 ls-minus-05px mb-20px">{{ $tab['label'] }}</h3>
                                    <p class="fw-500 text-dark-gray ls-minus-05px text-justify">{{ $tab['lead'] }}</p>
                                    <a href="{{ $tab['cta'] }}" class="btn btn-large btn-rounded with-rounded btn-white btn-box-shadow fw-600">{{ __('home.services_tabs.tabs.cta') }}<span class="bg-base-color text-white"><i class="bi bi-arrow-right-short icon-extra-medium"></i></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-style-08 border-bottom border-color-extra-medium-gray bg-white box-shadow-quadruple-large">
                <div class="container">
                    <div class="overflow-x-auto">
                        <ul class="nav nav-tabs border-0 fw-500 fs-19 text-center d-flex flex-nowrap">
                            @foreach($tabs as $key => $tab)
                            <li class="nav-item flex-shrink-0">
                                <a data-bs-toggle="tab" href="#tab_{{ $key }}" class="nav-link {{ $loop->first ? 'active' : '' }} px-3 py-3">
                                    {{ $tab['label'] }}<span class="tab-border bg-base-color"></span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
