<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nouislider.min.css') }}">
        @livewireStyles
    </head>
    <body class="home-page home-01 ">

        <!-- mobile menu -->
        <div class="mercado-clone-wrap">
            <div class="mercado-panels-actions-wrap">
                <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
            </div>
            <div class="mercado-panels"></div>
        </div>

        <!--header-->
        <header id="header" class="header header-style-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="topbar-menu-area">
                        <div class="container">
                            <div class="topbar-menu left-menu">
                                <ul>
                                    <li class="menu-item" >
                                        <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+93) 7700 38 759</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topbar-menu right-menu">
                                <ul>
                                    <li class="menu-item lang-menu menu-item-has-children parent">
                                        <a title="English" href="#"><span class="img label-before"><img src="{{ asset('assets/images/lang-en.png') }}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu lang" >
                                            <li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{ asset('assets/images/lang-hun.png')}}" alt="lang-hun"></span>Hungary</a></li>
                                            <li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img  src="{{ asset('assets/images/lang-ger.png')}}" alt="lang-ger" ></span>German</a></li>
                                            <li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img  src="{{ asset('assets/images/lang-fra.png')}}" alt="lang-fre"></span>French</a></li>
                                            <li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img  src="{{ asset('assets/images/lang-can.png')}}" alt="lang-can"></span>Canada</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="Afghani (AFN)" href="#">Afghani (AFN)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <li class="menu-item" >
                                                <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                            </li>
                                            <li class="menu-item" >
                                                <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                            </li>
                                            <li class="menu-item" >
                                                <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                            </li>
                                            <li class="menu-item" >
                                                <a title="Afghani (AFN)" href="#">Afghani (AFN)</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @if (Route::has('login'))
                                    @auth
                                    @if (Auth::user()->utype === 'ADM')
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <li class="menu-item" >
                                                <a title="Dashboad" href="{{ route('admin.dashboard') }}">Dashboad</a>
                                            </li>
                                            <li class="menu-item">
                                                <a title="All Categories" href="{{ route('admin.categories') }}">All Categories</a>
                                            </li>
                                            <li class="menu-item">
                                                <a  title="All Products" href="{{ route('admin.products') }}">All Products</a>
                                            </li>
                                            <li class="menu-item">
                                                <a  title="All coupons" href="{{ route('admin.coupons') }}">All Coupons</a>
                                            </li>
                                            <li class="menu-item">
                                                <a  title="All orders" href="{{ route('admin.orders') }}">All Orders</a>
                                            </li>
                                            <li class="menu-item">
                                                <a  title="Contact Messages" href="{{ route('admin.contact') }}">Contact Messages</a>
                                            </li>
                                            <li class="menu-item">
                                                <a  title="Contact Messages" href="{{ route('admin.settings') }}">Settings</a>
                                            </li>
                                            <li class="menu-item">
                                                <a title="manage home slider" href="{{ route('admin.homeSlider') }}">Manage Home Sliders</a>
                                            </li>
                                            <li class="menu-item">
                                                <a title="manage home categories" href="{{ route('admin.homeCategories') }}">Manage Home Categories</a>
                                            </li>
                                            <li class="menu-item">
                                                <a title="sale setting" href="{{ route('admin.sale') }}">Sale Setting</a>
                                            </li>
                                            <li class="menu-item">
                                                <a title="Logout" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <li class="menu-item" >
                                                <a title="Dashboad" href="{{ route('user.dashboard') }}">Dashboad</a>
                                            </li>
                                            <li class="menu-item" >
                                                <a title="My orders" href="{{ route('user.orders') }}">My Orders</a>
                                            </li>
                                            <li class="menu-item" >
                                                <a title="My orders" href="{{ route('user.changepassword') }}">Change Password</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                    @endif
                                    @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
                                    @endauth
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="mid-section main-info-area">
                            <div class="wrap-icon right-section">
                                
                                @livewire('wishlist-count-component')
                                
                                @livewire('cart-count-component')
                                
                                <div class="wrap-icon-section show-up-after-1024">
                                    <a href="#" class="mobile-navigation">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                            @livewire('header-search-component')
                            <div class="wrap-logo-top left-section">
                                <a href="/" class="link-to-home"><img src="{{ asset('assets/images/settings/logo.png') }}" alt="mercado"></a>
                            </div>
                        </div>
                    </div>

                    <div class="nav-section header-sticky">
                        <div class="header-nav-section">
                            <div class="container">
                                <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                                    <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                                    <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="primary-nav-section">
                            <div class="container">
                                <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                                    <li class="menu-item home-icon">
                                        <a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/shop" class="link-term mercado-item-title">Shop</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/cart" class="link-term mercado-item-title">Cart</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/checkout" class="link-term mercado-item-title">Checkout</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="about-us.html" class="link-term mercado-item-title">About Us</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/contact-us" class="link-term mercado-item-title">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{ $slot }}

        @livewire('footer-component')

        <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
        <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.flexslider.js')}}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.countdown.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js')}}"></script>
        <script src="{{ asset('assets/js/functions.js')}}"></script>
        <script src="{{ asset('assets/js/select2.min.js')}}"></script>
        <script src="{{ asset('assets/js/moment.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{ asset('assets/js/nouislider.min.js')}}"></script>
        <script src="{{ asset('assets/js/tinymce.min.js')}}"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
