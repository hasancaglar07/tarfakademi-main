@php
use App\Models\Post;

$footerMenu1 = Cache::remember('footer_menu_1', 60, function () {
    return \Biostate\FilamentMenuBuilder\Models\Menu::where('slug', 'footer1')->first()?->items->sortBy('sort') ?? collect();
});

$footerMenu2 = Cache::remember('footer_menu_2', 60, function () {
    return \Biostate\FilamentMenuBuilder\Models\Menu::where('slug', 'footer2')->first()?->items->sortBy('sort') ?? collect();
});

$footerMenu3 = Cache::remember('footer_menu_3', 60, function () {
    return \Biostate\FilamentMenuBuilder\Models\Menu::where('slug', 'footer3')->first()?->items->sortBy('sort') ?? collect();
});

$footerMenu4 = Cache::remember('footer_menu_4', 60, function () {
    return \Biostate\FilamentMenuBuilder\Models\Menu::where('slug', 'footer4')->first()?->items->sortBy('sort') ?? collect();
});
@endphp
<!-- start footer -->
<footer class="footer-dark bg-base-color pt-0 pb-2 lg-pb-35px">
    <div class="footer-top pt-50px pb-50px sm-pt-35px sm-pb-35px border-bottom border-1 border-color-transparent-white-light">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- start footer column -->
                <div class="col-xl-6 text-center text-xl-start lg-mb-30px sm-mb-20px">
                    <h3 class="text-white mb-5px fw-500 ls-minus-1px">{{ __('messages.footer.join_ecosystem') }}</h3>
                    <span class="fs-20 widget-text fw-300">{{ __('messages.footer.join_description') }}</span>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-xl-6 text-center text-xl-end">
                    <a href="{{ localized_route('form.show', ['slug' => 'basvuru']) }}" class="btn btn-extra-large btn-yellow left-icon btn-box-shadow btn-rounded text-transform-none d-inline-block align-middle me-15px xs-m-10px" aria-label="{{ __('messages.footer.free_application') }}"><i class="feather icon-feather-mail"></i>{{ __('messages.footer.free_application') }}</a>
                    <a href="{{ localized_route('contact.index') }}" class="btn btn-extra-large btn-dark-gray left-icon btn-box-shadow btn-rounded d-inline-block align-middle me-15px xs-m-10px" aria-label="{{ __('messages.footer.reach_us') }}"><i class="feather icon-feather-phone-call"></i>{{ __('messages.footer.reach_us') }}</a>

                </div>
                <!-- end footer column -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center fs-17 fw-300 mt-5 mb-4 md-mt-45px md-mb-45px xs-mt-35px xs-mb-35px">
            <!-- start footer column -->
            <div class="col-6 col-lg-3 order-sm-1 md-mb-40px xs-mb-30px last-paragraph-no-margin">
                @php
                    $g = app(\App\Settings\GeneralSettings::class);
                @endphp
                <a href="{{ localized_route('home') }}" class="footer-logo mb-15px d-inline-block">
                    <img src="{{ asset('img/tarf_white.png') }}" alt="{{ $g->site_name }}" style="max-height: 60px;">
                </a>
                <p class="w-85 xl-w-95 sm-w-100">{{ $g->footer_description ?? __('messages.footer.footer_description') }}</p>
                <div class="elements-social social-icon-style-02 mt-20px lg-mt-20px">
                    <ul class="small-icon light">
                        @if($g->facebook_url)
                            <li><a class="facebook" href="{{ $g->facebook_url }}" target="_blank" title="Facebook" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                        @endif
                        @if($g->twitter_url)
                            <li><a class="twitter" href="{{ $g->twitter_url }}" target="_blank" title="Twitter / X" aria-label="Twitter / X"><i class="fa-brands fa-x-twitter"></i></a></li>
                        @endif
                        @if($g->instagram_url)
                            <li><a class="instagram" href="{{ $g->instagram_url }}" target="_blank" title="Instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                        @endif
                        @if($g->linkedin_url)
                            <li><a class="linkedin" href="{{ $g->linkedin_url }}" target="_blank" title="LinkedIn" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        @endif
                        @if($g->youtube_url)
                            <li><a class="youtube" href="{{ $g->youtube_url }}" target="_blank" title="YouTube" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                @if($footerMenu1->isNotEmpty())
                    @if($footerMenu1->first()->parent_id === null)
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ $footerMenu1->first()->name }}</span>
                        <ul>
                            @foreach($footerMenu1 as $item)
                                @if($item->parent_id !== null)
                                    <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.corporate') }}</span>
                        <ul>
                            @foreach($footerMenu1 as $item)
                                <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.corporate') }}</span>
                    <ul>
                        <li><a href="{{ localized_route('about') }}">{{ __('messages.footer.about_us') }}</a></li>
                        <li><a href="{{ localized_route('page.show', ['page' => 'vizyon-degerler']) }}">{{ __('messages.footer.vision_values') }}</a></li>
                        <li><a href="{{ localized_route('page.show', ['page' => 'yonetim-ilkeleri']) }}">{{ __('messages.footer.management_principles') }}</a></li>
                        <li><a href="{{ localized_route('page.show', ['page' => 'etik-beyan']) }}">{{ __('messages.footer.ethical_statement') }}</a></li>
                        <li><a href="{{ localized_route('page.show', ['page' => 'basin-kiti']) }}">{{ __('messages.footer.press_kit') }}</a></li>
                        <li><a href="{{ localized_route('contact.index') }}">{{ __('messages.footer.contact') }}</a></li>
                    </ul>
                @endif
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-4 order-lg-3">
                @if($footerMenu2->isNotEmpty())
                    @if($footerMenu2->first()->parent_id === null)
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ $footerMenu2->first()->name }}</span>
                        <ul>
                            @foreach($footerMenu2 as $item)
                                @if($item->parent_id !== null)
                                    <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.activities') }}</span>
                        <ul>
                            @foreach($footerMenu2 as $item)
                                <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.activities') }}</span>
                    <ul>
                        @foreach(Post::where('post_type_id', 3)->get() as $service)
                            @php
                                $serviceSlug = get_translation_with_fallback($service, 'slug');
                            @endphp
                            <li><a href="{{ localized_route('services.show', [ 'slug' => $serviceSlug]) }}">{{ get_translation_with_fallback($service, 'title') }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-5 order-lg-4">
                @if($footerMenu3->isNotEmpty())
                    @if($footerMenu3->first()->parent_id === null)
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ $footerMenu3->first()->name }}</span>
                        <ul>
                            @foreach($footerMenu3 as $item)
                                @if($item->parent_id !== null)
                                    <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.resources') }}</span>
                        <ul>
                            @foreach($footerMenu3 as $item)
                                <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.resources') }}</span>
                    <ul>
                        <li><a href="{{ localized_route('blog.index') }}">{{ __('messages.footer.blog') }}</a></li>
                        <li><a href="{{ localized_route('faq.index') }}">{{ __('messages.footer.faq') }}</a></li>
                    </ul>
                @endif
            </div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-6 order-lg-5">
                @if($footerMenu4->isNotEmpty())
                    @if($footerMenu4->first()->parent_id === null)
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ $footerMenu4->first()->name }}</span>
                        <ul>
                            @foreach($footerMenu4 as $item)
                                @if($item->parent_id !== null)
                                    <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.contact') }}</span>
                        <ul>
                            @foreach($footerMenu4 as $item)
                                <li><a href="{{ $item->link }}" target="{{ $item->target }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <span class="fs-18 fw-400 d-block text-white mb-5px">{{ __('messages.footer.contact') }}</span>
                    @php
                        $g = $g ?? app(\App\Settings\GeneralSettings::class);
                    @endphp
                    @if($g->contact_email)
                        <p class="mb-5px">{{ __('messages.footer.email') }}</p>
                        <a href="mailto:{{ $g->contact_email }}" class="text-white lh-16 d-block mb-15px">{{ $g->contact_email }}</a>
                    @endif
                    @if($g->contact_phone)
                        <p class="mb-5px">{{ __('messages.footer.phone') }}</p>
                        <a href="tel:{{ $g->contact_phone }}" class="text-white lh-16 d-block mb-15px">{{ $g->contact_phone }}</a>
                    @endif
                    @if($g->contact_address || $g->contact_address_line1)
                        <p class="mb-5px">{{ __('messages.footer.address') }}</p>
                        <p class="text-white lh-16 mb-15px">
                            {{ $g->contact_address ?? trim(($g->contact_address_line1.' '.($g->contact_address_line2 ?? '')).' '.($g->contact_city ? $g->contact_city.', ' : '').($g->contact_country ?? '')) }}
                        </p>
                    @endif
                    @if($g->contact_map_url)
                        <a href="{{ $g->contact_map_url }}" target="_blank" class="btn btn-small btn-outline-white btn-rounded">{{ __('messages.footer.view_on_map') }}</a>
                    @endif
                @endif
            </div>
            <!-- end footer column -->
        </div>
        <div class="row align-items-center fs-16 fw-300">
            <!-- start copyright -->
            <div class="col-md-4 last-paragraph-no-margin order-2 order-md-1 text-center text-md-start"><p>{{ __('messages.footer.copyright_year') }} {{ now()->year }} <a href="{{ localized_route('home') }}" class="text-decoration-line-bottom text-white">{{ $g->site_name }}</a></p></div>
            <!-- end copyright -->
            <!-- start footer menu -->
            <div class="col-md-8 text-md-end order-1 order-md-2 text-center text-md-end sm-mb-10px">
                <ul class="footer-navbar sm-lh-normal">
                    @php
                        $g = $g ?? app(\App\Settings\GeneralSettings::class);
                    @endphp
                    <li><a href="{{ localized_route('page.show', ['page' => $g->privacy_policy_slug ?? 'gizlilik-politikasi']) }}" class="nav-link">{{ __('messages.footer.privacy_policy_link') }}</a></li>
                    <li><a href="{{ localized_route('page.show', ['page' => $g->terms_slug ?? 'sartlar-ve-kosullar']) }}" class="nav-link">{{ __('messages.footer.terms_conditions_link') }}</a></li>
                    <li><a href="{{ localized_route('page.show', ['page' => $g->copyright_slug ?? 'telif-hakki']) }}" class="nav-link">{{ __('messages.footer.copyright_link') }}</a></li>
                    <li><a href="{{ localized_route('page.show', ['page' => $g->cookie_prefs_slug ?? 'cerez-tercihleri']) }}" class="nav-link">{{ __('messages.footer.cookie_preferences') }}</a></li>
                </ul>
            </div>
            <!-- end footer menu -->
        </div>
    </div>
</footer>
<!-- end footer -->
