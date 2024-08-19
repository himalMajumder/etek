@php
    $authUser = auth()->user();
@endphp
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="facebook-domain-verification" content="fs4qsprlvohda0lf08ya52m7zxra86" />
    <meta name="google-site-verification" content="4h-lac_qRW3luXZKH_iQGjF4kcoyBgIPB77HZ4ASsAY" />
    <meta name="robots" content="all" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/img/favicon.svg') }}" />

    <!-- Title -->
    <title>Etek User Pannel</title>

    <meta name="description"
        content="Explore the latest electronics at our online store! From smartphones to smart home devices, find top-quality gadgets at competitive prices. Shop now for unbeatable deals and fast delivery." />
    <meta name="keywords" content="Electronics online store,Buy electronics online,Gadgets shop,Smartphone deals" />

    <!-- Meta OG Tags -->
    <meta property="og:site_name"
        content="Explore the latest electronics at our online store! From smartphones to smart home devices, find top-quality gadgets at competitive prices. Shop now for unbeatable deals and fast delivery." />
    <meta property="og:title"
        content="Explore the latest electronics at our online store! From smartphones to smart home devices, find top-quality gadgets at competitive prices. Shop now for unbeatable deals and fast delivery." />
    <meta property="og:description"
        content="Explore the latest electronics at our online store! From smartphones to smart home devices, find top-quality gadgets at competitive prices. Shop now for unbeatable deals and fast delivery." />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en" />
    <meta property="og:url" content="your url" />
    <meta property="og:image" content="your image" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="" />
    <!-- End Meta OG Tags -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/animate.min.css') }}" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl.carousel.min.css') }}" />
    <!-- Maginific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/maginific-popup.min.css') }}" />
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/fancybox.css') }}" />
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}" />
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/icofont.css') }}" />
    <!-- Uicons CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/uicons.css') }}" />
    <!-- Glightbox CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/glightbox.min.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/datepicker.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- User Pannel CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/user-pannel.css') }}" />
</head>

<body>
    <div class="page-wrapper">
        <!-- Mobile Menu Button Trigger -->
        <button type="button" class="mobile-menu-sidebar-icon btn btn-primary" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            <i class="fi fi-rr-user"></i>
        </button>

        <!-- Mobile Menu Offcanvas -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel" data-bs-scroll="false">
            <div class="modal-dialog offcanvas-dialog">
                <div class="modal-content">
                    <div class="getcom-user-sidebar user-mobile-menu-sidebar">
                        <div class="user-sidebar-head">
                            <div class="user-sidebar-profile">
                                <img alt="#" src="./assets/img/user-profile-img.png" />
                            </div>
                            <div class="user-sidebar-profile-info">
                                <h5>{{ $authUser->name }}</h5>
                                <p>{{ $authUser->phone }}</p>
                            </div>
                            <!-- Offcanvas Close Button -->
                            <button type="button" class="mobile-menu-sidebar-close" data-bs-dismiss="offcanvas"
                                aria-label="Close">
                                <i class="fi fi-rr-cross-small"></i>
                            </button>
                        </div>
                        <div class="user-sidebar-menus">
                            <ul class="user-sidebar-menu-list">
                                <li class="active">
                                    <a href="dashboard.html"><i class="fi-ss-apps"></i>Dashboard</a>
                                </li>
                                <li class="menu-collapse">
                                    <button class="menu-collapse-button">
                                        <i class="fi-ss-shopping-cart"></i>My orders
                                    </button>

                                    <ul class="menu-collapse-list">
                                        <li>
                                            <a href="{{ route('user.order') }}"><i
                                                    class="fi fi-sr-rectangle-list"></i>All orders
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('order.cancelation') }}"><i
                                                    class="fi fi-sr-delete-document"></i>Order cancellation</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('return.product') }}"><i
                                                    class="fi fi-sr-undo"></i>Return products</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('wishlist') }}"><i class="fi-ss-heart"></i>Wishlist’s</a>
                                </li>
                                <li>
                                    <a href="{{ route('promo.coupon') }}"><i class="fi-ss-ticket"></i>Promo/
                                        Coupon</a>
                                </li>
                                <li>
                                    <a href="{{ route('address') }}"><i class="fi-ss-map-marker"></i>Address</a>
                                </li>
                                <li>
                                    <a href="{{ route('payment') }}"><i class="fi-ss-credit-card"></i>Payments</a>
                                </li>
                                <li>
                                    <a href="{{ route('rewards') }}"><i class="fi-ss-trophy"></i>Rewards</a>
                                </li>
                                <li>
                                    <a href="{{ route('product.review') }}"><i class="fi-ss-star"></i>Product
                                        reviews</a>
                                </li>
                                <li>
                                    <a href="{{ route('support.ticket') }}"><i class="fi-ss-comments"></i>Support
                                        tickets</a>
                                </li>
                                <li>
                                    <a href="{{ route('manage.profile') }}"><i class="fi-ss-settings"></i>Manage
                                        profile</a>
                                </li>
                            </ul>
                        </div>

                        <div class="user-sidebar-profile-btn">
                            <a href="{{ route('logout') }}"><i class="fi-rr-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mobile Menu Offcanvas -->

        <!-- Compare Icon Fixed -->
        <div class="compare-icon-fixed">
            <a href="compare.html"><i class="fi fi-rs-code-compare"></i></a>
        </div>

        <!-- WhatsApp Floating Button -->
        <div class="floating_btn">
            <a target="_blank"
                href="https://api.whatsapp.com/send?phone=8801730797262&text=Hi%20there!%20I%27m%20Mostaim%20Billah%20Murad%20from%20GetUp%20Limited.%20I%20would%20be%20glad%20to%20assist%20you%20in%20any%20way%20I%20can">
                <div class="contact_icon">
                    <i class="icofont-whatsapp"></i>
                </div>
            </a>
        </div>


        @include('frontend.include.header')
        <main class="main">
            <!-- Dashboard Area -->
            <section class="getcom-user-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="getcom-user-body-bg">
                                <img alt="#" src="{{ asset('user/assets/img/user-hero-bg.png') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('frontend.user_include.sidebar')
                        @yield('content')
                    </div>
                </div>
            </section>
            <!-- End Dashboard Area -->
        </main>

        @php
            $generalinfos = DB::table('general_infos')->first();
        @endphp
        @include('frontend.include.footer')
    </div>

    <!-- Scroll top bar -->
    <button id="scroll__top">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="48" d="M112 244l144-144 144 144M256 120v292" />
        </svg>
    </button>


    <script src="{{ asset('user/assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery-migrate.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery-fancybox.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/modernizer.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/popper.js') }}" defer="defer"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}" defer="defer"></script>
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/active.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @include('frontend.include.script')
    @yield('js')
</body>

</html>
