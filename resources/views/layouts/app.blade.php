<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords"
        content="Mobile App Development, ​Stimulate your cognitive abilities while having fun, What We Do, Testimonials, Company Services, ​Love the way you work together?, Our Portfolio, About Us, ​Our way, Get in Touch, ​Level up your brand">
    <meta name="description" content="">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.3.1, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="application/ld+json">
        {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Фото и видео камеры",
    "logo": "@images/png-transparent-computer-icons-camera-ios-7-camera-purple-camera-lens-photography.png"
        } 
    </script>

    <meta name="theme-color" content="#a37fdf">
    <meta property="og:title" content="Главная">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body>
    <div id="app" style=" position: sticky;
    top: 0;
    z-index: 1000;">
        <header class="u-clearfix u-header u-sticky u-sticky-19c7 u-white u-header " id="sec-d402">
            <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
                <a href="/" class="u-image u-logo u-image-1" data-image-width="920" data-image-height="920">
                    <img src="/images/png-transparent-computer-icons-camera-ios-7-camera-purple-camera-lens-photography.png"
                        class="u-logo-image u-logo-image-1">
                </a>
                <nav class="u-menu u-menu-hamburger u-offcanvas u-menu-1" data-responsive-from="XL">
                    <div class="menu-collapse"
                        style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                        <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                            href="#" style="padding: 12px; font-size: calc(1em + 24px);">
                            <svg class="u-svg-link" viewBox="0 0 24 24">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                            </svg>
                            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px"
                                y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <rect y="1" width="16" height="2"></rect>
                                    <rect y="7" width="16" height="2"></rect>
                                    <rect y="13" width="16" height="2"></rect>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="u-custom-menu u-nav-container">
                        <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">

                            <li class="u-nav-item"><a
                                    class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                    href="{{ url('/') }}" style="padding: 10px 0px;">Главная</a>
                            </li>
                            <li class="u-nav-item"><a
                                    class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                    href="{{ url('/contacts') }}" style="padding: 10px 0px;">Контакты</a>
                            </li>
                            <li class="u-nav-item"><a
                                    class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                    href="{{ url('/about') }}" style="padding: 10px 0px;">О нас</a>
                            </li>
                            <li class="u-nav-item"><a
                                    class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                    href="{{ url('/magazin') }}" style="padding: 10px 0px;">Магазин</a>
                            </li>
                        </ul>
                    </div>
                    <div class="u-custom-menu u-nav-container-collapse">
                        <div
                            class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                            <div class="u-inner-container-layout u-sidenav-overflow">
                                <div class="u-menu-close"></div>
                                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                    @auth
                                        @if (Auth::user()->IsAdmin())
                                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                    href="{{ url('/admin') }}">Админ-Панель</a>
                                            </li>
                                        @endif
                                    @endauth
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                            href="{{ url('/') }}">Главная</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                            href="{{ url('/contacts') }}">Контакты</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                            href="{{ url('/about') }}">О
                                            нас</a>
                                    </li>
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                            href="{{ url('/magazin') }}">Магазин</a>
                                    </li>
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                    href="{{ route('login') }}">{{ __('Вход') }}</a></li>
                                        @endif
                                        @if (Route::has('register'))
                                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                    href="{{ route('register') }}">{{ __('Регистрация') }}</a></li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu h" aria-labelledby="navbarDropdown"
                                                style="background-color: rgb(255,255,255,0);">
                                                <a class="dropdown-item s" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    {{ __('Выйти') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                        <div class="u-black u-menu-overlay u-opacity u-opacity-70">
                        </div>
                    </div>
                </nav>
                <h1 class="u-text u-text-default u-text-palette-5-base u-text-1">Новый Взгляд</h1><!--shopping_cart-->
                <a class="u-shopping-cart u-shopping-cart-1" href="{{ url('/cart') }}"><span
                        class="u-icon u-icon-circle u-palette-1-base u-shopping-cart-icon u-text-white u-icon-1"><svg
                            class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16"
                            style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-321c"></use>
                        </svg><svg class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-321c">
                            <path d="M14.5,3l-2.1,5H6.1L5.9,7.6L4,3H14.5 M0,0v1h2.1L5,8l-2,4h11v-1H4.6l1-2H13l3-7H3.6L2.8,0H0z M12.5,13
                                                          c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5S13.3,13,12.5,13L12.5,13z M4.5,13C3.7,13,3,13.7,3,14.5S3.7,16,4.5,16
                                                          S6,15.3,6,14.5S5.3,13,4.5,13L4.5,13z"></path>
                        </svg>
                        <span class="u-icon-circle u-palette-1-base u-shopping-cart-count"
                            style="font-size: 0.75rem;"><!--shopping_cart_count-->{{ count(session('cart', [])) }}<!--/shopping_cart_count--></span>
                    </span>
                </a><!--/shopping_cart-->

            </div>
            <style class="u-sticky-style" data-style-id="19c7">
                .u-sticky-fixed.u-sticky-19c7:before,
                .u-body.u-sticky-fixed .u-sticky-19c7:before {
                    borders: top right bottom left !important
                }

                a.s:hover {
                    background-color: rgb(255, 255, 255, 0) !important
                }

                a.s {
                    color: red;
                    font-size: 20px !important;
                    margin-left: 1.5rem !important;
                }
            </style>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
