<x-app-layout>


    <x-page-title :title="__('messages.about.page_title')" :subtitle="__('messages.about.page_subtitle')" />
    <section>
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center mb-5"
                data-anime='{ "el": "childs", "translateX": [-30, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <!-- start features box item -->
                <div class="col icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-very-light-gray h-100 justify-content-end feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        <div class="feature-box-icon">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-75px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </a>
                        </div>
                        <div class="feature-box-content">
                            <a href="#"
                                class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Akademik
                                Süreçlerimiz</a>
                            <p class="mb-30px">Eğitimden uygulamaya kadar her adım, ölçülebilir hedeflerle
                                yapılandırılır. Programlarımız; atölyeler, seminerler, proje temelli öğrenme ve
                                mentorluk aşamalarından oluşur.</p>
                        </div>
                    </div>
                </div>



                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-07 transition-inner-all md-mb-30px">
                    <div
                        class="bg-very-light-gray h-100 justify-content-end feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        <div class="feature-box-icon">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-75px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>

                            </a>
                        </div>
                        <div class="feature-box-content">
                            <a href="#"
                                class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Teknoloji ve
                                Bilimsel Gelişim Desteği</a>
                            <p class="mb-30px">Biz entelektüel gelişimi hedefliyoruz. Yazılım ve teknoloji alanlarında
                                proje temelli çalışmalarla bireylere üretim becerisi kazandırır.</p>
                        </div>
                        <span
                            class="position-absolute box-shadow-large top-25px lg-top-15px right-25px lg-right-15px bg-white border-radius-18px text-dark-gray fs-11 fw-700 text-uppercase ps-15px pe-15px lh-26 ls-minus-05px">New</span>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-07 transition-inner-all">
                    <div
                        class="bg-very-light-gray h-100 justify-content-end feature-box flex-column-reverse p-15 md-p-13 border-radius-8px">
                        <div class="feature-box-icon">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-75px">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                                </svg>

                            </a>
                        </div>
                        <div class="feature-box-content">
                            <a href="#"
                                class="d-inline-block fw-600 text-dark-gray mb-5px fs-20 ls-minus-05px">Akademik ve
                                Teknolojik Hizmetlerimiz</a>
                            <p class="mb-30px">Tarf; yazılım teknolojileri, bilimsel yayıncılık, sertifika programları
                                ve konferans organizasyonlarıyla çok yönlü bir ekosistem sunar.</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
            </div>
            <div class="row"
                data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col-12 text-center">
                    <div
                        class="d-inline-block align-middle bg-yellow fw-600 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-12 me-10px lh-30 sm-m-5px">
                        Bize Güvenenler</div>
                    <div class="d-inline-block align-middle text-dark-gray fs-19 fw-600 ls-minus-05px">Tarf; <span
                            class="text-decoration-line-bottom text-dark-gray">10.000'den fazla katılımcı</span> ve
                        onlarca kurumla iş birliği yapmaktadır.</div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-0 big-section">
        <div class="container">
            <div class="row align-items-center"
                data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col-lg-6 position-relative md-mb-14 sm-mb-17 xs-mb-23">
                    <div class="w-70 md-w-75 xs-w-90" data-animation-delay="50" data-shadow-animation="true">
                        <img src="https://images.unsplash.com/photo-1470075801209-17f9ec0cada6?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=987"
                            alt="" class="border-radius-8px w-100">
                    </div>
                    <div class="w-55 overflow-hidden position-absolute right-15px xs-w-60 bottom-minus-20px"
                        data-shadow-animation="true" data-animation-delay="250"
                        data-bottom-top="transform: translateY(50px)" data-top-bottom="transform: translateY(-50px)">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=987"
                            alt="" class="border-radius-8px w-100 box-shadow-quadruple-large" />
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 text-center text-lg-start">
                    <h3 class="fw-700 text-dark-gray ls-minus-2px">Bilim, Teknoloji ve Eğitimde Öncüyüz</h3>
                    <p class="mb-40px xs-mb-30px w-90 lg-w-95 md-w-100">Disiplinler arası yaklaşımımız ve güçlü akademik
                        ekibimizle; bilgi üretimi, teknoloji geliştirme ve kültürel farkındalıkta öncü bir platformuz.
                    </p>
                    <div
                        class="row align-items-center mb-30px xs-mb-25px justify-content-center justify-content-lg-start">
                        <!-- start counter item -->
                        <div class="col-lg-5 col-md-4 col-sm-5 last-paragraph-no-margin counter-style-04 xs-mb-25px">
                            <h3 class="vertical-counter d-inline-flex fw-700 text-dark-gray mb-0 ls-minus-2px xl-ls-minus-1px"
                                data-text="+" data-to="280"><sup class="text-yellow top-0px me-5px"><i
                                        class="feather icon-feather-users icon-very-medium"></i></sup></h3>
                            <span class="fw-500 text-dark-gray mb-10px d-block ls-minus-05px">Akademik Kadromuz</span>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col-lg-6 col-md-4 col-sm-5 last-paragraph-no-margin counter-style-04">
                            <h3 class="vertical-counter d-inline-flex fw-700 text-dark-gray mb-0 ls-minus-2px xl-ls-minus-1px"
                                data-text="+" data-to="465"><sup class="text-yellow top-0px me-5px"><i
                                        class="feather icon-feather-briefcase icon-very-medium"></i></sup></h3>
                            <span class="fw-500 text-dark-gray mb-10px d-block ls-minus-05px">Tamamlanan Projeler</span>
                        </div>
                        <!-- end counter item -->
                    </div>
                    <a href="demo-accounting-services.html"
                        class="btn btn-large btn-rounded with-rounded btn-base-color btn-round-edge btn-box-shadow">Hemen
                        İletişime Geçin<span class="bg-orient-blue text-white"><i
                                class="feather icon-feather-arrow-right icon-small"></i></span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="p-0 bg-base-color">
        <div class="container">
            <div class="row align-items-center justify-content-center g-0">
                <div class="col-auto d-flex align-items-center"
                    data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <img src="https://craftohtml.themezaa.com/images/demo-accounting-img-05.jpg" alt="" />
                    <div class="fs-19 lh-28 last-paragraph-no-margin text-white pt-15px pb-15px">
                        <p>Sizin için anlamlı, ölçülebilir ve kalıcı öğrenme süreçleri tasarlıyoruz. <a href="#"
                                class="text-decoration-line-bottom fw-500 text-white">Tarf'ye katılın</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-very-light-gray overflow-hidden cover-background position-relative overlap-height"
        style="background-image: url(https://craftohtml.themezaa.com/images/demo-accounting-company-04.jpg)">
        <div class="container overlap-gap-section">
            <div class="row align-items-center">
                <div class="col-lg-6 md-mb-50px"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h3 class="fw-700 text-dark-gray ls-minus-2px">Bilim ve Teknoloji Alanında Güvenilir Bir Rehber
                    </h3>
                    <p class="w-90 lg-w-100">Tarf, eğitimde kalite, projelerde yenilik ve yayınlarda doğruluk
                        ilkeleriyle faaliyet gösterir.</p>
                    <div class="accordion accordion-style-02 w-90 lg-w-100" id="accordion-style-02"
                        data-active-icon="fa-chevron-up" data-inactive-icon="fa-chevron-down">
                        <!-- start accordion item -->
                        <div class="accordion-item active-accordion">
                            <div class="accordion-header border-bottom border-color-transparent-dark-very-light">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-01"
                                    aria-expanded="true" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="fa-solid fa-chevron-up fs-15"></i><span
                                            class="fs-19 fw-600 ls-minus-05px">Akademik Danışmanlık Nedir?</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-01" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-style-02">
                                <div
                                    class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent-dark-very-light">
                                    <p>Akademik danışmanlık, bireylerin veya kurumların hedeflerine uygun eğitim, proje
                                        ve yayın stratejilerinin belirlenmesidir. Tarf, her alanda mentorluk ve
                                        rehberlik desteği sunar.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="accordion-item">
                            <div class="accordion-header border-bottom border-color-transparent-dark-very-light">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-02"
                                    aria-expanded="false" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="fa-solid fa-chevron-down fs-15"></i><span
                                            class="fs-19 fw-600 ls-minus-05px">Proje Yönetimi Nedir?</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-02" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-style-02">
                                <div
                                    class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent-dark-very-light">
                                    <p>Her proje; planlama, uygulama, değerlendirme ve yaygınlaştırma aşamalarını
                                        içerir. Biz, sadece sonuç değil, sürecin kalitesini de önemseriz.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="accordion-item">
                            <div class="accordion-header border-bottom border-color-transparent">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-03"
                                    aria-expanded="false" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="fa-solid fa-chevron-down fs-15"></i><span
                                            class="fs-19 fw-600 ls-minus-05px">Kurumsal Müşteriler İçin Ne
                                            Yapıyoruz?</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-03" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-style-02">
                                <div
                                    class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent">
                                    <p>Kurumsal müşterilerimize özel eğitim programları, teknoloji danışmanlığı ve proje
                                        geliştirme desteği sunuyoruz. Her ihtiyaca özel çözümler üretiyoruz.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6"
                    data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <!-- start map -->
                    <div class="outside-box-right-30 position-relative">
                        <img src="https://craftohtml.themezaa.com/images/demo-accounting-company-03.png"
                            alt="" />
                        <div class="bg-base-color video-icon-box video-icon-medium feature-box-icon-rounded position-absolute top-100px left-100px mt-10 ms-15 w-40px h-40px rounded-circle d-flex align-items-center justify-content-center"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                            title="<span class=tooltip-title>Tarf</span><p class=m-0>Aşağı Öveçler MH 1324. CD No:63 - Çankaya / Ankara</p>">
                            <span>
                                <span class="video-icon">
                                    <span
                                        class="bg-base-color w-100 h-100 border-radius-100 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-location-dot m-0 text-white icon-small"></i>
                                    </span>
                                    <span class="video-icon-sonar">
                                        <span class="video-icon-sonar-bfr bg-red"></span>
                                        <span class="video-icon-sonar-bfr bg-yellow"></span>
                                    </span>
                                </span>
                            </span>
                        </div>
                        <div class="bg-base-color video-icon-box video-icon-medium feature-box-icon-rounded position-absolute bottom-100px start-50 mb-10 ms-7 w-40px h-40px rounded-circle d-flex align-items-center justify-content-center"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                            title="<span class=tooltip-title>Tarf</span><p class=m-0>2839 lalemant view road, Niagara falls, Canada</p>">
                            <span>
                                <span class="video-icon">
                                    <span
                                        class="w-100 h-100 bg-base-color border-radius-100 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-location-dot m-0 text-white icon-small"></i>
                                    </span>
                                    <span class="video-icon-sonar">
                                        <span class="video-icon-sonar-bfr bg-red"></span>
                                        <span class="video-icon-sonar-bfr bg-yellow"></span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <!-- end map -->
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pt-md-0">
        <div class="container overlap-section">
            <div class="row m-0 align-items-center justify-content-center bg-white border-radius-100px md-border-radius-6px ps-10px pe-10px box-shadow-quadruple-large appear anime-complete"
                data-anime='{ "scale": [1.1, 1], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col-lg-10">
                    <div class="swiper slider-one-slide testimonials-style-09"
                        data-slider-options='{ "slidesPerView": 1, "loop": true, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            <!-- start text slider item -->
                            <div class="swiper-slide">
                                <div class="row align-items-center pt-25px pb-25px">
                                    <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=210&h=210"
                                            class="rounded-circle w-100px h-100px md-mb-35px" alt="">
                                        <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img
                                                src="images/demo-accounting-home-quote-img.png"
                                                class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto"
                                                alt="">Tarf, sadece bilgi değil vizyon kazandırıyor. Program
                                            yapısı modern, eğitmenler alanında yetkin.</span>
                                    </div>
                                    <div class="col-lg-1 d-none d-lg-inline-block">
                                        <div
                                            class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                        <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Ayşe
                                            K.</span>
                                        <div>Bilgisayar Mühendisliği Öğrencisi</div>
                                    </div>
                                </div>
                            </div>
                            <!-- end text slider item -->
                            <!-- start text slider item -->
                            <div class="swiper-slide">
                                <div class="row align-items-center pt-25px pb-25px">
                                    <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=200&h=200"
                                            class="rounded-circle w-100px h-100px md-mb-35px" alt="">
                                        <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img
                                                src="images/demo-accounting-home-quote-img.png"
                                                class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto"
                                                alt="">Gerçek bir üretim ortamında öğrenmek fark yaratıyor.
                                            Teknoloji takımları çok iyi organize edilmiş.</span>
                                    </div>
                                    <div class="col-lg-1 d-none d-lg-inline-block">
                                        <div
                                            class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                        <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Mehmet
                                            A.</span>
                                        <div>Yazılım Geliştirici</div>
                                    </div>
                                </div>
                            </div>
                            <!-- end text slider item -->
                            <!-- start text slider item -->
                            <div class="swiper-slide">
                                <div class="row align-items-center pt-25px pb-25px">
                                    <div class="col-lg-8 d-lg-flex align-items-center text-center text-lg-start">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=200&h=200"
                                            class="rounded-circle w-100px h-100px md-mb-35px" alt="">
                                        <span class="d-block ps-40px md-ps-0 md-mx-auto position-relative"><img
                                                src="images/demo-accounting-home-quote-img.png"
                                                class="position-absolute left-minus-25px top-minus-15px lg-top-minus-5px md-top-minus-50px w-40px md-left-0px md-right-0px md-mx-auto"
                                                alt="">Tarf ile hem akademik hem de pratik becerilerimi
                                            geliştirdim. Eğitim kalitesi gerçekten yüksek.</span>
                                    </div>
                                    <div class="col-lg-1 d-none d-lg-inline-block">
                                        <div
                                            class="separator-line w-1px md-w-100 h-60px md-h-1px bg-extra-medium-gray mx-auto">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-center text-lg-start md-mt-15px">
                                        <span class="fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-28">Zeynep
                                            D.</span>
                                        <div>Proje Yöneticisi</div>
                                    </div>
                                </div>
                            </div>
                            <!-- end text slider item -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 md-mb-25px">
                    <div class="d-flex justify-content-center">
                        <!-- start slider navigation -->
                        <div
                            class="slider-one-slide-prev-1 swiper-button-prev slider-navigation-style-04 bg-very-light-gray">
                            <i class="fa-solid fa-arrow-left icon-small text-dark-gray"></i></div>
                        <div
                            class="slider-one-slide-next-1 swiper-button-next slider-navigation-style-04 bg-very-light-gray">
                            <i class="fa-solid fa-arrow-right icon-small text-dark-gray"></i></div>
                        <!-- end slider navigation -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="py-0">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-6 col-md-7 col-sm-8 text-center"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h3 class="fw-700 text-dark-gray ls-minus-2px">Profesyonel Akademik Kadro</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2"
                data-anime='{ "el": "childs", "translateX": [-50, 0], "opacity": [0,1], "duration": 1200, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <!-- start team member item -->
                <div class="col text-center team-style-01 md-mb-30px">
                    <figure class="mb-0 hover-box box-hover position-relative">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=756"
                            alt="" class="border-radius-6px" />
                        <figcaption class="w-100 p-30px lg-p-25px bg-white">
                            <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                                <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Dr. Selim
                                    Yılmaz</span>
                                <p class="m-0">Akademi Direktörü</p>
                                <div class="social-icon hover-text mt-20px lg-mt-10px social-icon-style-05">
                                    <a href="https://www.facebook.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Fb.</a>
                                    <a href="https://www.instagram.com/" target="_blank"
                                        class="fw-600 text-dark-gray">In.</a>
                                    <a href="https://www.twitter.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Tw.</a>
                                    <a href="https://dribbble.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Dr.</a>
                                </div>
                            </div>
                            <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end team member item -->
                <!-- start team member item -->
                <div class="col text-center team-style-01 md-mb-30px">
                    <figure class="mb-0 hover-box box-hover position-relative">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=756"
                            alt="" class="border-radius-6px" />
                        <figcaption class="w-100 p-30px lg-p-25px bg-white">
                            <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                                <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Dr. Elif
                                    Kaya</span>
                                <p class="m-0">Yayın Koordinatörü</p>
                                <div class="social-icon hover-text mt-20px lg-mt-10px">
                                    <a href="https://www.facebook.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Fb.</a>
                                    <a href="https://www.instagram.com/" target="_blank"
                                        class="fw-600 text-dark-gray">In.</a>
                                    <a href="https://www.twitter.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Tw.</a>
                                    <a href="https://dribbble.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Dr.</a>
                                </div>
                            </div>
                            <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end team member item -->
                <!-- start team member item -->
                <div class="col text-center team-style-01 xs-mb-30px">
                    <figure class="mb-0 hover-box box-hover position-relative">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=756"
                            alt="" class="border-radius-6px" />
                        <figcaption class="w-100 p-30px lg-p-25px bg-white">
                            <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                                <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Murat
                                    Aksoy</span>
                                <p class="m-0">Teknoloji Takımları Mentoru</p>
                                <div class="social-icon hover-text mt-20px lg-mt-10px">
                                    <a href="https://www.facebook.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Fb.</a>
                                    <a href="https://www.instagram.com/" target="_blank"
                                        class="fw-600 text-dark-gray">In.</a>
                                    <a href="https://www.twitter.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Tw.</a>
                                    <a href="https://dribbble.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Dr.</a>
                                </div>
                            </div>
                            <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end team member item -->
                <!-- start team member item -->
                <div class="col text-center team-style-01">
                    <figure class="mb-0 hover-box box-hover position-relative">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=600&h=756"
                            alt="" class="border-radius-6px" />
                        <figcaption class="w-100 p-30px lg-p-25px bg-white">
                            <div class="position-relative z-index-1 overflow-hidden lg-pb-5px">
                                <span class="fs-19 d-block fw-600 text-dark-gray lh-26 ls-minus-05px">Zeynep
                                    Arslan</span>
                                <p class="m-0">Proje Geliştirme Uzmanı</p>
                                <div class="social-icon hover-text mt-20px lg-mt-10px">
                                    <a href="https://www.facebook.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Fb.</a>
                                    <a href="https://www.instagram.com/" target="_blank"
                                        class="fw-600 text-dark-gray">In.</a>
                                    <a href="https://www.twitter.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Tw.</a>
                                    <a href="https://dribbble.com/" target="_blank"
                                        class="fw-600 text-dark-gray">Dr.</a>
                                </div>
                            </div>
                            <div class="box-overlay bg-white box-shadow-quadruple-large border-radius-6px"></div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end team member item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="half-section">
        <div class="container">
            <div class="row justify-content-center mb-30px"
                data-anime='{ "translateX": [-50, 0], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col-lg-5 text-center mb-15px">
                    <span
                        class="text-dark-gray fw-600 fs-16 ls-minus-05px text-uppercase border-1 pb-5px border-bottom border-color-extra-medium-gray text-dark-gray">Tarf
                        Topluluğuna Katılın</span>
                </div>
            </div>
            <div class="row position-relative clients-style-08 mb-35px"
                data-anime='{"translateY": [0, 0], "opacity": [0,1], "duration": 800, "delay": 50, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <div class="col swiper text-center feather-shadow"
                    data-slider-options='{ "slidesPerView": 2, "spaceBetween":0, "speed": 6000, "loop": true, "pagination": { "el": ".slider-four-slide-pagination-2", "clickable": false }, "allowTouchMove": false, "autoplay": { "delay":0, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next-2", "prevEl": ".slider-four-slide-prev-2" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 5 }, "992": { "slidesPerView": 4 }, "768": { "slidesPerView": 3 } }, "effect": "slide" }'>
                    <div class="swiper-wrapper marquee-slide">
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-netflix-oxford-blue.svg" class="h-40px xs-h-30px"
                                    alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-invision-oxford-blue.svg"
                                    class="h-40px xs-h-30px" alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-yahoo-oxford-blue.svg" class="h-40px xs-h-30px"
                                    alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-walmart-oxford-blue.svg" class="h-40px xs-h-30px"
                                    alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-logitech-oxford-blue.svg"
                                    class="h-40px xs-h-30px" alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-netflix-oxford-blue.svg" class="h-40px xs-h-30px"
                                    alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-invision-oxford-blue.svg"
                                    class="h-40px xs-h-30px" alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-yahoo-oxford-blue.svg" class="h-40px xs-h-30px"
                                    alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-walmart-oxford-blue.svg" class="h-40px xs-h-30px"
                                    alt="" /></a>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <a href="#"><img src="images/logo-logitech-oxford-blue.svg"
                                    class="h-40px xs-h-30px" alt="" /></a>
                        </div>
                        <!-- end client item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

</x-app-layout>
