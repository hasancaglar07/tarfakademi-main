@php
    $topbarMenu = Cache::remember('topbar_menu', 60, function () {
        $menu = \Biostate\FilamentMenuBuilder\Models\Menu::where('slug', 'topbar')->first();
        if (!$menu) {
            return collect();
        }
        return $menu->items()->orderBy('_lft', 'asc')->get()->toTree();
    });

    $headerMenu = Cache::remember('header_menu', 60, function () {
        $menu = \Biostate\FilamentMenuBuilder\Models\Menu::where('slug', 'header')->first();
        if (!$menu) {
            return collect();
        }
        return $menu->items()->orderBy('_lft', 'asc')->get()->toTree();
    });
@endphp

<header class="header-with-topbar">
    <div class="header-top-bar" style="background:#282828;">
        <div class="container-fluid">
            <div class="row align-items-center m-0" style="min-height: 40px;">
                <div class="col-lg-6 col-md-7 text-center text-md-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start h-100">
                        <ul class="navbar-nav d-flex flex-row align-items-center gap-3 text-white mb-0" id="topbar-menu">
                            @foreach ($topbarMenu as $item)
                                <li class="nav-item @if ($item->children->isNotEmpty()) dropdown @endif">
                                    <a class="nav-link @if ($item->children->isNotEmpty()) dropdown-toggle @endif py-2 fs-14"
                                        href="{{ $item->children->isEmpty() ? $item->link : '#' }}"
                                        target="{{ $item->children->isEmpty() ? $item->target : '_self' }}"
                                        id="topbar-menu-{{ $item->id }}" role="button" aria-expanded="false">
                                        {{ $item->name }}
                                    </a>
                                    @if ($item->children->isNotEmpty())
                                        <ul class="dropdown-menu" aria-labelledby="topbar-menu-{{ $item->id }}">
                                            @foreach ($item->children as $child)
                                                <li>
                                                    <a class="dropdown-item" href="{{ $child->link }}"
                                                        target="{{ $child->target ?? '_self' }}">{{ $child->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 d-none d-md-block">
                    <div class="d-flex align-items-center justify-content-end h-100 gap-3">
                        @php $g = app(\App\Settings\GeneralSettings::class); @endphp
                        <div class="d-flex align-items-center gap-2">
                            @if ($g->facebook_url)
                                <a href="{{ $g->facebook_url }}" target="_blank" class="text-white social-icon-link"
                                    title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if ($g->twitter_url)
                                <a href="{{ $g->twitter_url }}" target="_blank" class="text-white social-icon-link"
                                    title="Twitter"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if ($g->instagram_url)
                                <a href="{{ $g->instagram_url }}" target="_blank" class="text-white social-icon-link"
                                    title="Instagram"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if ($g->linkedin_url)
                                <a href="{{ $g->linkedin_url }}" target="_blank" class="text-white social-icon-link"
                                    title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if ($g->youtube_url)
                                <a href="{{ $g->youtube_url }}" target="_blank" class="text-white social-icon-link"
                                    title="YouTube"><i class="fab fa-youtube"></i></a>
                            @endif
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="dropdown language-dropdown">
                                <a class="text-white text-decoration-none language-trigger d-flex align-items-center gap-1"
                                    href="#" id="topLanguageDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @php
                                        $currentLocale = app()->getLocale();
                                        $languages = [
                                            'tr' => ['name' => 'Türkçe', 'flag' => '🇹🇷', 'short' => 'TR'],
                                            'en' => ['name' => 'English', 'flag' => '🇬🇧', 'short' => 'EN'],
                                            'ar' => ['name' => 'العربية', 'flag' => '🇸🇦', 'short' => 'AR'],
                                        ];
                                    @endphp
                                    <span class="flag-icon">{{ $languages[$currentLocale]['flag'] }}</span>
                                    <span class="fw-500"
                                        style="font-size: 13px;">{{ $languages[$currentLocale]['short'] }}</span>
                                    <i class="fa fa-chevron-down" style="font-size: 9px;"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end language-menu"
                                    aria-labelledby="topLanguageDropdown">
                                    @foreach ($languages as $locale => $lang)
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-2 {{ $currentLocale === $locale ? 'active' : '' }}"
                                                href="{{ route('language.switch', ['locale' => $locale]) }}">
                                                <span class="flag-icon-small">{{ $lang['flag'] }}</span>
                                                <span class="fw-500"
                                                    style="font-size: 13px;">{{ $lang['name'] }}</span>
                                                @if ($currentLocale === $locale)
                                                    <i class="fa fa-check ms-auto text-success"
                                                        style="font-size: 10px;"></i>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg header-light bg-white responsive-sticky" style="top: 45px;">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between m-0 w-100">
                <div class="col-auto">
                    <a class="navbar-brand" href="{{ localized_route('home') }}">
                        <img src="{{ $g->logo_default ? asset('storage/' . $g->logo_default) : asset('/img/tarf.png') }}"
                            alt="{{ $g->site_name }}" class="default-logo" width="170" height="36">
                        <img src="{{ $g->logo_alt ? asset('storage/' . $g->logo_alt) : asset('/img/tarf.png') }}"
                            alt="{{ $g->site_name }}" class="alt-logo" width="0" height="0">
                        <img src="{{ $g->logo_mobile ? asset('storage/' . $g->logo_mobile) : asset('/img/tarf.png') }}"
                            alt="{{ $g->site_name }}" class="mobile-logo" width="0" height="0">
                    </a>
                </div>
                {{-- <div class="col d-none d-lg-block">
                    <div class="d-flex justify-content-start" style="position: relative; max-width: 320px;">
                        <form class="search-form" action="{{ localized_route('search') }}" method="GET">
                            <input type="text" class="form-control search-input" style="width: 100%;" name="q" placeholder="{{ __('messages.common.search_placeholder') ?? 'Ne aramıştınız?' }}">
                            <i class="feather icon-feather-search search-icon"></i>
                            <button class="btn search-btn" type="submit">{{ __('messages.common.search') ?? 'Ara' }}</button>
                        </form>
                    </div>
                </div> --}}
                <div class="col-auto">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span><span class="navbar-toggler-line"></span><span
                            class="navbar-toggler-line"></span><span class="navbar-toggler-line"></span>
                    </button>

                    <div class="header-icon d-none d-lg-flex align-items-center">
                        <a href="#" class="search-icon-btn" data-bs-toggle="modal"
                            data-bs-target="#searchModal" aria-label="Arama Yap">
                            <i class="feather icon-feather-search"></i>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav fw-600 ms-auto" id="header-menu">
                            @foreach ($headerMenu as $item)
                                <li
                                    class="nav-item @if ($item->children->isNotEmpty()) dropdown dropdown-with-icon-style02 @endif">
                                    <a href="{{ $item->children->isEmpty() ? $item->link : '#' }}" class="nav-link"
                                        id="navbarDropdownMenuLink-{{ $item->id }}" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{ $item->name }}
                                        @if ($item->children->isNotEmpty())
                                            <span class="dropdown-toggle"></span>
                                        @endif
                                    </a>
                                    @if ($item->children->isNotEmpty())
                                        <ul class="dropdown-menu"
                                            aria-labelledby="navbarDropdownMenuLink-{{ $item->id }}">
                                            @foreach ($item->children as $child)
                                                <li>
                                                    <a class="dropdown-item" href="{{ $child->link }}"
                                                        target="{{ $child->target ?? '_self' }}">{{ $child->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            <li class="nav-item d-md-none mb-3">
                                <div class="nav-link py-3">
                                    <div class="social-icon d-flex justify-content-center gap-15px">
                                        @if ($g->facebook_url)
                                            <a href="{{ $g->facebook_url }}" target="_blank" class="text-dark-gray"
                                                title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if ($g->twitter_url)
                                            <a href="{{ $g->twitter_url }}" target="_blank" class="text-dark-gray"
                                                title="Twitter"><i class="fab fa-twitter"></i></a>
                                        @endif
                                        @if ($g->instagram_url)
                                            <a href="{{ $g->instagram_url }}" target="_blank" class="text-dark-gray"
                                                title="Instagram"><i class="fab fa-instagram"></i></a>
                                        @endif
                                        @if ($g->linkedin_url)
                                            <a href="{{ $g->linkedin_url }}" target="_blank" class="text-dark-gray"
                                                title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                        @endif
                                        @if ($g->youtube_url)
                                            <a href="{{ $g->youtube_url }}" target="_blank" class="text-dark-gray"
                                                title="YouTube"><i class="fab fa-youtube"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item d-md-none mb-3">
                                <a class="nav-link py-3" href="#" data-bs-toggle="modal"
                                    data-bs-target="#searchModal">
                                    <i class="feather icon-feather-search"></i> {{ __('messages.common.search') }}
                                </a>
                            </li>
                            <li class="nav-item d-md-none">
                                <div class="px-3 py-2">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="feather icon-feather-globe me-2 text-muted"></i>
                                        <span
                                            class="text-muted fs-14">{{ __('messages.common.language') ?? 'Dil' }}</span>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-start">
                                        @php
                                            $currentLocale = app()->getLocale();
                                            $languages = [
                                                'tr' => ['name' => 'Türkçe', 'flag' => '🇹🇷'],
                                                'en' => ['name' => 'English', 'flag' => '🇬🇧'],
                                                'ar' => ['name' => 'العربية', 'flag' => '🇸🇦'],
                                            ];
                                        @endphp
                                        @foreach ($languages as $locale => $lang)
                                            <a href="{{ route('language.switch', ['locale' => $locale]) }}"
                                                class="btn btn-sm {{ $currentLocale === $locale ? 'btn-base-color' : 'btn-outline-secondary' }} d-flex align-items-center gap-2 px-3 py-2">
                                                <span class="fs-5">{{ $lang['flag'] }}</span>
                                                <span class="fw-500">{{ $lang['name'] }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


<div class="modal fade search-modal" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
            <form class="search-form-modal" action="{{ localized_route('search') }}" method="GET">
                <input type="text" class="form-control search-input-modal" name="q"
                    placeholder="{{ __('messages.common.search_placeholder') ?? 'Ne aramıştınız?' }}"
                    autocomplete="off">
                <button class="btn search-btn-modal" type="submit" aria-label="Ara">
                    <i class="feather icon-feather-search"></i>
                </button>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Bu fonksiyon hem Topbar hem de Header menüsü için ortak çalışacak
        const setupCustomDropdown = (menuId) => {
            const menuContainer = document.getElementById(menuId);
            if (!menuContainer) return;

            const dropdowns = menuContainer.querySelectorAll('.dropdown');
            let closeTimeout;

            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('a[role="button"]');
                const menu = dropdown.querySelector('.dropdown-menu');

                if (!toggle || !menu) return;

                const openMenu = () => {
                    // Diğer açık menüleri kapat
                    menuContainer.querySelectorAll('.dropdown-menu.show').forEach(m => {
                        if (m !== menu) m.classList.remove('show');
                    });
                    if (closeTimeout) clearTimeout(closeTimeout);

                    // Dropdown menüyü aç
                    menu.classList.add('show');
                    toggle.setAttribute('aria-expanded', 'true');

                    // Sağ kenardan taşma kontrolü
                    setTimeout(() => {
                        const menuRect = menu.getBoundingClientRect();
                        const viewportWidth = window.innerWidth;
                        const padding = 20; // Viewport kenarlarından minimum mesafe

                        if (menuRect.right > viewportWidth - padding) {
                            // Sağ kenardan taşıyorsa, sola kaydır
                            const overflow = menuRect.right - (viewportWidth - padding);
                            menu.style.left = `-${overflow}px`;
                        } else {
                            // Normal pozisyonda bırak
                            menu.style.left = '0px';
                        }
                    }, 10);
                };

                const closeMenu = (delay = 250) => {
                    closeTimeout = setTimeout(() => {
                        menu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                        // Pozisyonu sıfırla
                        menu.style.left = '0px';
                    }, delay);
                };

                // Masaüstü için hover olayları
                dropdown.addEventListener('mouseenter', () => {
                    if (window.innerWidth >= 992) openMenu();
                });
                dropdown.addEventListener('mouseleave', () => {
                    if (window.innerWidth >= 992) closeMenu();
                });

                // Menünün kendisi üzerine gelince kapanmayı engelle (sadece masaüstü)
                menu.addEventListener('mouseenter', () => {
                    if (window.innerWidth >= 992) {
                        if (closeTimeout) clearTimeout(closeTimeout);
                    }
                });

                // Mobil/Touch cihazlar için tıklama olayı
                toggle.addEventListener('click', function(e) {
                    // Link # ise veya mobil ise varsayılan davranışı engelle
                    if (this.getAttribute('href') === '#' || window.innerWidth < 992) {
                        e.preventDefault();
                        e.stopPropagation();
                    } else {
                        // Eğer link # değilse ve masaüstü ise, linke gitmesine izin ver.
                        return;
                    }

                    const isAlreadyOpen = menu.classList.contains('show');

                    // Diğer tüm menüleri kapat
                    menuContainer.querySelectorAll('.dropdown-menu.show').forEach(m => {
                        if (m !== menu) {
                            m.classList.remove('show');
                            m.previousElementSibling.setAttribute('aria-expanded',
                                'false');
                        }
                    });

                    if (!isAlreadyOpen) {
                        openMenu();
                    } else {
                        closeMenu(0);
                    }
                });
            });

            // Dışarı tıklayınca menüyü kapat
            document.addEventListener('click', function(e) {
                if (!menuContainer.contains(e.target)) {
                    menuContainer.querySelectorAll('.dropdown-menu.show').forEach(m => {
                        m.classList.remove('show');
                        m.previousElementSibling.setAttribute('aria-expanded', 'false');
                    });
                }
            });
        };

        // Fonksiyonu her iki menü için de çağır
        setupCustomDropdown('topbar-menu');
        setupCustomDropdown('header-menu');

        // Window resize olayında dropdown pozisyonlarını kontrol et
        window.addEventListener('resize', function() {
            const openMenus = document.querySelectorAll('.dropdown-menu.show');
            openMenus.forEach(menu => {
                const menuRect = menu.getBoundingClientRect();
                const viewportWidth = window.innerWidth;
                const padding = 20;

                if (menuRect.right > viewportWidth - padding) {
                    const overflow = menuRect.right - (viewportWidth - padding);
                    menu.style.left = `-${overflow}px`;
                } else {
                    menu.style.left = '0px';
                }
            });
        });

        // Arama modalı açıldığında input'a odaklan
        const searchModal = document.getElementById('searchModal');
        if (searchModal) {
            const searchInput = searchModal.querySelector('.search-input-modal');
            searchModal.addEventListener('shown.bs.modal', function() {
                searchInput.focus();
            });
        }

    });
</script>
