@push('css')
    <style>
        .contact-hero {
            padding: clamp(3rem, 7vw, 6rem) 0 clamp(2rem, 6vw, 4rem);
            background: radial-gradient(circle at 20% 20%, rgba(37, 99, 235, 0.08), transparent 55%),
                radial-gradient(circle at 80% 0%, rgba(244, 114, 182, 0.08), transparent 45%), #f8fafc;
            position: relative;
        }

        .contact-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.08), rgba(15, 23, 42, 0.02));
            mix-blend-mode: multiply;
            pointer-events: none;
        }

        .contact-hero .floating-grid {
            position: absolute;
            inset: 10% 8% 10% 8%;
            background-image: linear-gradient(transparent 96%, rgba(148, 163, 184, 0.25) 100%),
                linear-gradient(90deg, transparent 96%, rgba(148, 163, 184, 0.25) 100%);
            background-size: 32px 32px;
            opacity: .4;
            filter: blur(0.5px);
            animation: slowPulse 12s ease-in-out infinite;
            pointer-events: none;
        }

        .gradient-sphere {
            position: absolute;
            width: 20rem;
            height: 20rem;
            border-radius: 50%;
            filter: blur(40px);
            opacity: .65;
            animation: floaty 18s ease-in-out infinite;
        }

        .gradient-sphere-1 {
            top: -8rem;
            left: -1rem;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.35), rgba(59, 130, 246, 0));
        }

        .gradient-sphere-2 {
            bottom: -6rem;
            right: 10%;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.35), rgba(236, 72, 153, 0));
            animation-delay: -6s;
        }

        .gradient-sphere-3 {
            top: 30%;
            left: 45%;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.3), rgba(14, 165, 233, 0));
            animation-delay: -3s;
        }

        .floating-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 9px 18px;
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(255, 255, 255, 0.85);
            color: #0f172a;
            font-size: .78rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-weight: 600;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.09);
            position: relative;
            overflow: hidden;
        }

        .floating-badge::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.8), transparent);
            transform: translateX(-120%);
            animation: shimmer 4.5s infinite;
        }

        .floating-badge i {
            font-size: 1rem;
            color: #2563eb;
        }

        .floating-badge.is-compact {
            padding: 8px 14px;
            font-size: .72rem;
            opacity: .85;
        }

        .floating-badge.dark {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.3);
            color: #fff;
        }

        .floating-badge.dark i {
            color: #fff;
        }

        .hero-heading {
            font-size: clamp(2rem, 4vw, 3.2rem);
            line-height: 1.15;
        }

        .hero-meta {
            margin-top: 20px;
        }

        .hero-meta-pill {
            min-width: 150px;
            padding: 14px 18px;
            border-radius: 20px;
            background: rgba(15, 23, 42, 0.85);
            color: #fff;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.25);
            backdrop-filter: blur(8px);
        }

        .hero-meta-pill span {
            text-transform: uppercase;
            letter-spacing: .08em;
            font-size: .7rem;
            opacity: .7;
        }

        .hero-meta-pill strong {
            font-size: 1.1rem;
            margin-top: 4px;
            display: block;
        }

        .contact-highlight-card {
            display: flex;
            align-items: flex-start;
            gap: 18px;
            padding: 23px 25px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 20px 55px rgba(15, 23, 42, 0.08);
            height: 100%;
            transition: transform .4s ease, box-shadow .4s ease;
        }

        .contact-highlight-card .icon {
            width: 54px;
            height: 54px;
            border-radius: 18px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.35rem;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.35);
            flex-shrink: 0;
        }

        .contact-highlight-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 65px rgba(37, 99, 235, 0.18);
        }

        .contact-highlight-card small {
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 600;
            font-size: .72rem;
            color: #64748b;
        }

        .contact-highlight-card a,
        .contact-highlight-card strong {
            font-size: 1rem;
            color: #0f172a;
            font-weight: 600;
            text-decoration: none;
        }

        .contact-highlight-card a:hover {
            text-decoration: underline;
        }

        .contact-visual {
            position: relative;
        }

        .contact-visual__card {
            background: radial-gradient(circle at top, #0f172a, #111827 65%);
            color: #fff;
            border-radius: 34px;
            padding: 34px;
            box-shadow: 0 35px 90px rgba(15, 23, 42, 0.35);
            position: relative;
            overflow: hidden;
        }

        .contact-visual__card::after {
            content: "";
            position: absolute;
            inset: 15px;
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            pointer-events: none;
        }

        .contact-visual__badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            background: rgba(15, 23, 42, 0.6);
            font-size: .78rem;
            letter-spacing: .05em;
            text-transform: uppercase;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .contact-visual__image {
            border-radius: 20px;
            margin-bottom: 24px;
            width: 100%;
            object-fit: cover;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
            position: relative;
            z-index: 1;
        }

        .contact-visual__list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .contact-visual__list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: .95rem;
            opacity: .9;
        }

        .contact-visual__list i {
            color: #38bdf8;
        }

        .contact-visual__cta {
            margin-top: 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .contact-visual__cta span {
            font-size: .9rem;
            opacity: .7;
        }

        .contact-visual__spark {
            position: absolute;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.25), transparent);
            filter: blur(20px);
            animation: floaty 12s ease-in-out infinite;
        }

        .contact-visual__spark--left {
            left: -40px;
            top: 20%;
        }

        .contact-visual__spark--right {
            right: -20px;
            bottom: 5%;
            animation-delay: -4s;
        }

        .contact-map-section {
            padding: clamp(1.5rem, 5vw, 4rem) 0;
        }

        .contact-map-wrapper {
            border-radius: 32px;
            box-shadow: 0 30px 70px rgba(15, 23, 42, 0.1);
            overflow: hidden;
            position: relative;
            background: #fff;
        }

        .contact-map-info {
            background: linear-gradient(165deg, #0f172a, #1f2937);
            color: #fff;
        }

        .contact-map-info h4 {
            color: #fff;
        }

        .contact-map-info p {
            opacity: .75;
        }

        .map-detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 25px;
        }

        .map-detail-card {
            border-radius: 18px;
            padding: 16px 18px;
            background: rgba(15, 23, 42, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .map-detail-card .detail-label {
            display: block;
            font-size: .7rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            opacity: .6;
        }

        .map-detail-card p {
            margin-bottom: 0;
            margin-top: 10px;
            color: #fff;
            line-height: 1.5;
        }

        .map-detail-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            margin-top: 10px;
        }

        .map-detail-link:hover {
            text-decoration: underline;
        }

        .contact-schedule {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin: 30px 0;
        }

        .contact-schedule div {
            border-radius: 18px;
            padding: 14px 18px;
            background: rgba(15, 23, 42, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .contact-schedule div span {
            display: block;
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            opacity: .7;
        }

        .contact-schedule div strong {
            font-size: 1.05rem;
        }

        .contact-map-cta {
            border-radius: 999px;
            padding: 10px 22px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: background .3s ease, transform .3s ease;
        }

        .contact-map-cta:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateX(4px);
        }

        .map-shell {
            height: 100%;
        }

        #map.contact-map {
            width: 100%;
            height: 100%;
            min-height: 380px;
        }

        .contact-map iframe {
            width: 100%;
            height: 100%;
            min-height: 380px;
            border: 0;
        }

        .contact-form-section {
            padding: clamp(2rem, 6vw, 5rem) 0 clamp(3rem, 8vw, 6rem);
            position: relative;
            background: #f8fafc;
        }

        .contact-form-section .floating-dots {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .contact-form-section .floating-dots span {
            position: absolute;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.15), transparent);
            animation: floaty 14s ease-in-out infinite;
        }

        .contact-form-section .floating-dots span:nth-child(2) {
            top: 10%;
            right: 15%;
            animation-delay: -4s;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.18), transparent);
        }

        .contact-form-section .floating-dots span:nth-child(3) {
            bottom: 5%;
            left: 20%;
            animation-delay: -7s;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.15), transparent);
        }

        .contact-form-wrapper {
            border-radius: 34px;
            background: #fff;
            box-shadow: 0 35px 80px rgba(15, 23, 42, 0.12);
            overflow: hidden;
            position: relative;
        }

        .contact-form-info {
            background: linear-gradient(160deg, #111827, #1e3a8a);
            color: #fff;
        }

        .contact-form-info p {
            color: rgba(255, 255, 255, 0.78);
        }

        .contact-step-list {
            list-style: none;
            padding: 0;
            margin: 32px 0 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .contact-step-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .contact-step-list span.step-index {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .contact-step-list strong {
            display: block;
            font-size: 1rem;
        }

        .contact-form-fields {
            padding: clamp(2rem, 5vw, 3.5rem);
            background: #fff;
        }

        .contact-form-fields h5 {
            margin-bottom: 1rem;
        }

        .contact-form-control {
            background: rgba(248, 250, 252, 0.9);
            border: 1px solid rgba(148, 163, 184, 0.4);
            border-radius: 16px;
            padding: 14px 18px;
            transition: border .3s ease, box-shadow .3s ease, background .3s ease;
        }

        .contact-form-control:focus {
            border-color: #2563eb;
            background: #fff;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.15);
        }

        .contact-form-fields textarea.contact-form-control {
            min-height: 150px;
            resize: vertical;
        }

        .btn-premium {
            background: linear-gradient(120deg, #2563eb, #7c3aed);
            color: #fff !important;
            border: none;
            box-shadow: 0 25px 40px rgba(76, 29, 149, 0.35);
            padding: 12px 28px;
            border-radius: 999px;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 35px 60px rgba(76, 29, 149, 0.45);
        }

        .contact-social-bar {
            margin-top: 60px;
            padding: 30px;
            border-radius: 28px;
            background: #fff;
            box-shadow: 0 25px 65px rgba(15, 23, 42, 0.08);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 24px;
            justify-content: space-between;
        }

        .contact-social-bar ul {
            margin: 0;
        }

        .contact-social-bar .elements-social li a {
            border-radius: 999px;
            background: rgba(248, 250, 252, 0.9);
            border: 1px solid rgba(226, 232, 240, 0.8);
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .contact-social-bar .elements-social li a:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.15);
        }

        @keyframes floaty {
            0% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-12px) translateX(8px);
            }

            100% {
                transform: translateY(0) translateX(0);
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-120%);
            }

            60% {
                transform: translateX(140%);
            }

            100% {
                transform: translateX(140%);
            }
        }

        @keyframes slowPulse {
            0% {
                opacity: .2;
            }

            50% {
                opacity: .35;
            }

            100% {
                opacity: .2;
            }
        }

        @media (max-width: 1199.98px) {
            .contact-visual__card {
                margin-top: 25px;
            }
        }

        @media (max-width: 991.98px) {
            .hero-meta-pill {
                background: rgba(15, 23, 42, 0.9);
            }

            .contact-form-wrapper {
                flex-direction: column;
            }
        }

        @media (max-width: 767.98px) {
            .contact-social-bar {
                padding: 24px;
            }

            .contact-highlight-card {
                padding: 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .contact-hero .floating-grid,
            .gradient-sphere,
            .floating-badge::after,
            .contact-visual__spark,
            .contact-form-section .floating-dots span {
                animation: none !important;
            }
        }
    </style>
@endpush

<x-app-layout>

    <x-page-title :title="__('messages.contact.page_title')" :subtitle="__('messages.contact.page_subtitle')" />

    @php
        $locale = app()->getLocale();
        $g = app(\App\Settings\GeneralSettings::class);
        $defaultContact = [
            'address_line1' => 'Aşağı Öveçler Mah. 1324. Cd No:63',
            'address_line2' => 'Dikmen, 06460 Çankaya/Ankara',
            'phone' => '+90 312 283 00 00',
            'email' => 'bilgi@verenel.org.tr',
            'map_url' => 'https://www.google.com/maps/place/VERENEL+DERNE%C4%9E%C4%B0/@39.8937501,32.7488323,13z/data=!4m22!1m15!4m14!1m6!1m2!1s0x14d345001edf907f:0x11169b63277c4f7!2zVkVSRU5FTCBERVJORcSexLA!2m2!1d32.82505!2d39.8937501!1m6!1m2!1s0x14d345001edf907f:0x11169b63277c4f7!2zQcWfYcSfxLEgw5Z2ZcOnbGVyLCAxMzI0LiBDZC4gTm86NjMsIDA2NDYwIMOHYW5rYXlhL0Fua2FyYQ!2m2!1d32.82505!2d39.8937501!3m5!1s0x14d345001edf907f:0x11169b63277c4f7!8m2!3d39.8937501!4d32.82505!16s%2Fg%2F11y74p7_vw?hl=tr&entry=ttu&g_ep=EgoyMDI1MTExMi4wIKXMDSoASAFQAw%3D%3D',
            'plus_code' => 'VRVG+G2 Çankaya, Ankara',
            'directions_label' => 'Yol Tarifi Al',
        ];
        $composedAddress = trim(($g->contact_address_line1 ?? '') . ' ' . ($g->contact_address_line2 ?? '') . ' ' . ($g->contact_city ? $g->contact_city . ', ' : '') . ($g->contact_country ?? ''));
        $primaryAddress = $g->contact_address ?: ($composedAddress ?: trim($defaultContact['address_line1'] . ' ' . $defaultContact['address_line2']));
        $contactEmail = $g->contact_email ?: $defaultContact['email'];
        $contactPhone = $g->contact_phone ?: $defaultContact['phone'];
        $addressLine1 = $g->contact_address_line1 ?: $defaultContact['address_line1'];
        $secondaryChunks = array_filter([
            $g->contact_address_line2 ?? null,
            $g->contact_city ?? null,
            $g->contact_country ?? null,
        ]);
        $addressLine2 = count($secondaryChunks) ? implode(', ', $secondaryChunks) : $defaultContact['address_line2'];
        $mapUrl = $g->contact_map_url ?: $defaultContact['map_url'];
        $mapOptions = $mapUrl ? ['url' => $mapUrl] : ['lat' => 39.8937501, 'lng' => 32.82505];
        $mapEmbedUrl = $mapUrl
            ? (\Illuminate\Support\Str::contains($mapUrl, 'output=embed')
                ? $mapUrl
                : $mapUrl . (\Illuminate\Support\Str::contains($mapUrl, '?') ? '&' : '?') . 'output=embed')
            : null;
        $plusCode = $defaultContact['plus_code'];
        $directionsLabel = $defaultContact['directions_label'];
    @endphp

    <section class="contact-hero position-relative overflow-hidden">
        <span class="floating-grid"></span>
        <span class="gradient-sphere gradient-sphere-1"></span>
        <span class="gradient-sphere gradient-sphere-2"></span>
        <span class="gradient-sphere gradient-sphere-3"></span>
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 700, "delay": 0, "staggervalue": 200, "easing": "easeOutQuad" }'>
                    <span class="floating-badge"><i class="bi bi-stars"></i>{{ __('messages.contact.page_subtitle') }}</span>
                    <h2 class="text-dark-gray fw-700 ls-minus-2px hero-heading mt-3">
                        {{ isset($page) ? get_translation_with_fallback($page, 'title', $locale) : __('messages.contact.have_project') }}
                    </h2>
                    @if (isset($page) && get_translation_with_fallback($page, 'excerpt', $locale))
                        <p class="w-95 md-w-100 mt-3">{{ strip_tags(get_translation_with_fallback($page, 'excerpt', $locale)) }}</p>
                    @else
                        <p class="w-95 md-w-100 mt-3">{{ __('messages.contact.reply_promise') }}</p>
                    @endif
                    <div class="hero-meta d-flex flex-wrap gap-3">
                        <div class="hero-meta-pill">
                            <span>Yanıt süresi</span>
                            <strong>24 saat içinde</strong>
                        </div>
                        <div class="hero-meta-pill">
                            <span>Toplantı formatı</span>
                            <strong>Video &amp; fiziksel</strong>
                        </div>
                    </div>
                    <div class="row g-4 mt-4" data-anime='{ "el": "childs", "translateY": [40, 0], "opacity": [0,1], "duration": 600, "delay": 150, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        @if ($contactEmail)
                            <div class="col-sm-6 col-lg-4">
                                <div class="contact-highlight-card">
                                    <div class="icon"><i class="bi bi-envelope-paper-heart"></i></div>
                                    <div>
                                        <small>İletişim kanalı</small>
                                        <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($contactPhone)
                            <div class="col-sm-6 col-lg-4">
                                <div class="contact-highlight-card">
                                    <div class="icon"><i class="bi bi-telephone-outbound"></i></div>
                                    <div>
                                        <small>Keşif görüşmesi</small>
                                        <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($primaryAddress)
                            <div class="col-sm-6 col-lg-4">
                                <div class="contact-highlight-card">
                                    <div class="icon"><i class="bi bi-geo-alt"></i></div>
                                    <div>
                                        <small>Stüdyo adresi</small>
                                        <strong>{{ $primaryAddress }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6" data-anime='{ "translateY": [60, 0], "opacity": [0,1], "duration": 700, "delay": 200, "easing": "easeOutQuad" }'>
                    <div class="contact-visual">
                        <div class="contact-visual__card">
                            <div class="contact-visual__badge"><i class="bi bi-broadcast-pin"></i>{{ $g->site_name }}</div>
                            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80"
                                alt="TARF stüdyo görüşmesi" class="contact-visual__image">
                            <ul class="contact-visual__list">
                                <li><i class="bi bi-check2-circle"></i>Strateji, tasarım ve üretimi tek masada topluyoruz.</li>
                                <li><i class="bi bi-check2-circle"></i>Kişiselleştirilmiş yol haritası ve kilometre taşları oluşturuyoruz.</li>
                                <li><i class="bi bi-check2-circle"></i>Sprint bazlı şeffaf raporlama ile süreci kontrol edebilirsiniz.</li>
                            </ul>
                            <div class="contact-visual__cta">
                                <span>Ön tanışma oturumları 30 dakikalık çevrim içi görüşmeler şeklinde gerçekleşir.</span>
                                @if ($contactEmail)
                                    <a href="mailto:{{ $contactEmail }}" class="btn btn-premium btn-rounded">Ön görüşme
                                        ayarla</a>
                                @endif
                            </div>
                        </div>
                        <span class="contact-visual__spark contact-visual__spark--left"></span>
                        <span class="contact-visual__spark contact-visual__spark--right"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-map-section" id="location">
        <div class="container">
            <div class="contact-map-wrapper row g-0 align-items-stretch">
                <div class="col-lg-5 contact-map-info p-4 p-lg-5">
                    <span class="floating-badge dark is-compact"><i class="bi bi-geo-alt"></i>Studio</span>
                    <h4 class="fw-700 ls-minus-1px mt-3">Lokasyon ve randevu</h4>
                    @if ($primaryAddress)
                        <p class="mt-3">{{ $primaryAddress }}</p>
                    @endif
                    <div class="contact-schedule">
                        <div>
                            <span>Çalışma saatleri</span>
                            <strong>09:00 - 18:00</strong>
                        </div>
                        <div>
                            <span>Tercih edilen kanal</span>
                            <strong>E-posta + canlı görüşme</strong>
                        </div>
                        @if ($contactPhone)
                            <div>
                                <span>Doğrudan hat</span>
                                <strong>{{ $contactPhone }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="map-detail-grid">
                        <div class="map-detail-card">
                            <span class="detail-label">Adres</span>
                            <p>{{ $addressLine1 }}<br>{{ $addressLine2 }}</p>
                            @if ($mapUrl)
                                <a class="map-detail-link" href="{{ $mapUrl }}" target="_blank" rel="noopener">
                                    {{ $directionsLabel }} <i class="bi bi-arrow-up-right"></i>
                                </a>
                            @endif
                        </div>
                        <div class="map-detail-card">
                            <span class="detail-label">İletişim Bilgileri</span>
                            @if ($contactPhone)
                                <p class="mb-1"><strong>T:</strong> <a class="text-white text-decoration-none" href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a></p>
                            @endif
                            @if ($contactEmail)
                                <p class="mb-0"><strong>E:</strong> <a class="text-white text-decoration-none" href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></p>
                            @endif
                        </div>
                        <div class="map-detail-card">
                            <span class="detail-label">Konum Kodu</span>
                            <p class="mb-0">{{ $plusCode }}</p>
                        </div>
                    </div>
                    @if ($contactEmail)
                        <a class="contact-map-cta mt-4" href="mailto:{{ $contactEmail }}">
                            {{ __('messages.common.send_message') }}<i class="bi bi-arrow-up-right"></i>
                        </a>
                    @endif
                </div>
                <div class="col-lg-7">
                    <div class="map-shell">
                        <div id="map" class="map contact-map" data-map-options='@json($mapOptions)'>
                            @if ($mapEmbedUrl)
                                <iframe src="{{ $mapEmbedUrl }}" loading="lazy" allowfullscreen aria-label="Verenel Derneği konum haritası"></iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-section">
        <div class="floating-dots"><span></span><span></span><span></span></div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <div class="row g-0 contact-form-wrapper">
                        <div class="col-lg-5 contact-form-info p-4 p-lg-5 d-flex flex-column">
                            <div>
                                <span class="floating-badge dark is-compact"><i class="bi bi-lightning-charge"></i>{{ __('messages.contact.page_title') }}</span>
                                <h3 class="fw-700 ls-minus-1px mt-4">{{ __('messages.contact.help_question') }}</h3>
                                <p class="mt-3">{{ __('messages.contact.reply_promise') }}</p>
                                <ul class="contact-step-list mt-4">
                                    <li>
                                        <span class="step-index">01</span>
                                        <div>
                                            <strong>Keşif ve brief</strong>
                                            <p class="mb-0 opacity-75">Hedeflerinizi anlamak için 15 dakikalık ön görüşme planlıyoruz.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="step-index">02</span>
                                        <div>
                                            <strong>Deneyim atölyesi</strong>
                                            <p class="mb-0 opacity-75">Trend raporları, kullanıcı ihtiyaçları ve MVP kapsamını birlikte tanımlarız.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="step-index">03</span>
                                        <div>
                                            <strong>İterasyon ve teslim</strong>
                                            <p class="mb-0 opacity-75">Sürprizsiz uygulama için sprint bazlı raporlama ve demo iterasyonları göndeririz.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @if ($contactEmail)
                                <div class="mt-4 pt-3 border-top" style="border-color: rgba(255,255,255,0.3) !important;">
                                    <span class="d-block opacity-75">Öncelikli iletişim</span>
                                    <a class="d-inline-flex align-items-center gap-2 fw-600 text-white" href="mailto:{{ $contactEmail }}">
                                        {{ $contactEmail }} <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-7 contact-form-fields">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                                <h5 class="fw-600 mb-0">Proje detayları</h5>
                                <span class="text-muted fs-14">* zorunlu alanlar</span>
                            </div>
                            <form action="email-templates/contact-form.php" method="post" class="row g-4 contact-form-style-02">
                                <div class="col-md-6">
                                    <input class="input-name form-control contact-form-control required" type="text" name="name"
                                        placeholder="Adınız*" />
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control contact-form-control required" type="email" name="email"
                                        placeholder="E-posta adresiniz*" />
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control contact-form-control" type="tel" name="phone"
                                        placeholder="Telefon numaranız" />
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control contact-form-control" type="text" name="subject"
                                        placeholder="Konunuz" />
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control contact-form-control" cols="40" rows="4" name="message" placeholder="Mesajınız"></textarea>
                                </div>
                                <div class="col-md-7">
                                    <p class="fs-15 lh-26 mb-0">Gizliliğinizi korumaya kararlıyız. Açık rızanız olmadan sizin hakkınızda hiçbir zaman bilgi toplamayacağız.</p>
                                </div>
                                <div class="col-md-5 text-md-end text-start">
                                    <input type="hidden" name="redirect" value="">
                                    <button class="btn btn-base-color btn-medium btn-rounded btn-box-shadow submit btn-premium"
                                        type="submit">Mesaj Gönder</button>
                                </div>
                                <div class="col-12">
                                    <div class="form-results mt-20px d-none"></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="contact-social-bar" data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 700, "delay": 200, "easing": "easeOutQuad" }'>
                        <div>
                            <h6 class="text-dark-gray fw-600 mb-1 ls-minus-1px">Sosyal medya ile bağlantı kurun</h6>
                            <p class="mb-0 text-muted">Güncel iş birlikleri ve deneyim raporlarını ilk siz öğrenin.</p>
                        </div>
                        <div class="elements-social social-icon-style-04 text-center text-md-start ps-lg-0">
                            <ul class="large-icon dark d-flex gap-2">
                                @if ($g->facebook_url)
                                    <li class="m-0"><a class="facebook" href="{{ $g->facebook_url }}" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i><span></span></a></li>
                                @endif
                                @if ($g->twitter_url)
                                    <li class="m-0"><a class="twitter" href="{{ $g->twitter_url }}" target="_blank"><i
                                                class="fa-brands fa-x-twitter"></i><span></span></a></li>
                                @endif
                                @if ($g->instagram_url)
                                    <li class="m-0"><a class="instagram" href="{{ $g->instagram_url }}" target="_blank"><i
                                                class="fa-brands fa-instagram"></i><span></span></a></li>
                                @endif
                                @if ($g->linkedin_url)
                                    <li class="m-0"><a class="linkedin" href="{{ $g->linkedin_url }}" target="_blank"><i
                                                class="fa-brands fa-linkedin-in"></i><span></span></a></li>
                                @endif
                                @if ($g->youtube_url)
                                    <li class="m-0"><a class="youtube" href="{{ $g->youtube_url }}" target="_blank"><i
                                                class="fa-brands fa-youtube"></i><span></span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
