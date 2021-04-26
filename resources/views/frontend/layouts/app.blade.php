<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>{{ setting('app_name') }} | {{ setting('app_short_description') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" type="image/png" href="{{ $app_logo }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/vendor/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/vendor/bootstrap.min.css">

    <!-- Plugin CSS Files -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugin/slick.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugin/material-scrolltop.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugin/price_range_style.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugin/in-number.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugin/venobox.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugin/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/main.css">

    <style>
        /* The container */
        .input-container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 17px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .input-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .input-container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .input-container input:checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .input-container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .input-container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

    </style>
    @stack('css_lib')

</head>

<body>
    @if (auth()->check())

    @else

    @endif

    <!-- ::::::  Start Header Section  ::::::  -->
    <header>
        <!--  Start Large Header Section   -->
        <div class="header d-none d-lg-block">
            <!-- Start Header Top area -->
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header__top-content d-flex justify-content-between align-items-center">
                                <div class="header__top-content--left">
                                    <span>Free Delivery: Take advantage of our time to save event</span>
                                </div>
                                <ul class="header__top-content--right user-set-role d-flex">
                                    <li class="user-currency pos-relative">
                                        <a class="user-set-role__button" href="#" data-toggle="dropdown"
                                            aria-expanded="false">{{ app()->getLocale() ? getAvailableLanguages()[app()->getLocale()] : 'Select Language' }}<i
                                                class="fal fa-chevron-down"></i></a>
                                        <ul class="expand-dropdown-menu dropdown-menu">
                                            @foreach (getAvailableLanguages() as $key => $value)
                                                <li><a href="{{ url('locale/' . $key) }}"
                                                        class='selected_country'>{{ $value }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="user-currency pos-relative">
                                        <a class="user-set-role__button" href="#" data-toggle="dropdown"
                                            aria-expanded="false">{{ request()->get('country_name') ? request()->get('country_name') : 'Select Country' }}<i
                                                class="fal fa-chevron-down"></i></a>
                                        <ul class="expand-dropdown-menu dropdown-menu">
                                            @foreach ($app_countries as $key => $value)
                                                <li><a href="{{ route('search') . '?country_id=' . $key . '&country_name=' . $value }}"
                                                        class='selected_country' data-id="{{ $key }}"><img
                                                            src="https://lipis.github.io/flag-icon-css/flags/1x1/{{ strtolower($key) }}.svg"
                                                            alt=""
                                                            style="width: 23px;height:17px">{{ $value }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Start Header Top area -->

            <!-- Start Header Center area -->
            <div class="header__center sticky-header p-tb-10">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <!-- Start Logo -->
                            <div class="header__logo">
                                <a href="{{ url('/') }}" class="header__logo-link img-responsive">
                                    <img class="header__logo-img img-fluid" src="{{ $app_logo }}" alt="">
                                </a>
                            </div> <!-- End Logo -->
                            <!-- Start Header Menu -->
                            <div class="header-menu">
                                <nav>
                                    <ul class="header__nav">
                                        <!--Start Single Nav link-->
                                        <li class="header__nav-item pos-relative">
                                            <a href="{{ url('/') }}" class="header__nav-link">Home</a>
                                        </li> <!-- End Single Nav link-->
                                        <!--Start Single Nav link-->
                                        <li class="header__nav-item pos-relative">
                                            <a href="javascript:void(0)" class="header__nav-link">Contact Us</a>
                                        </li> <!-- End Single Nav link-->
                                        <!--Start Single Nav link-->
                                        <li class="header__nav-item pos-relative">
                                            <a href="javascript:void(0)" class="header__nav-link">About Us</a>
                                        </li> <!-- End Single Nav link-->
                                    </ul>
                                </nav>
                            </div> <!-- End Header Menu -->
                            <!-- Start Wishlist-AddCart -->
                            <ul class="header__user-action-icon">
                                <!-- Start Header Wishlist Box -->
                                <li>
                                    <a href="{{ route('login') }}">
                                        <i class="icon-users"></i>
                                    </a>
                                </li> <!-- End Header Wishlist Box -->
                                <!-- Start Header Wishlist Box -->
                                @auth
                                    <li>
                                        <a href="{{ route('favorites.index') }}">
                                            <i class="icon-heart"></i>
                                            <span class="item-count pos-absolute">{{ $app_favorites }}</span>
                                        </a>
                                    </li> <!-- End Header Wishlist Box -->
                                    <!-- Start Header Add Cart Box -->
                                    <li>
                                        <a href="{{ route('cart') }}">
                                            <i class="icon-shopping-cart"></i>
                                            <span class="wishlist-item-count pos-absolute">{{ $app_carts }}</span>
                                        </a>
                                    </li> <!-- End Header Add Cart Box -->

                                @endauth

                                @guest
                                    <li>
                                        <a href="wishlist.html">
                                            <i class="icon-heart"></i>
                                            <span class="item-count pos-absolute">0</span>
                                        </a>
                                    </li> <!-- End Header Wishlist Box -->
                                    <!-- Start Header Add Cart Box -->
                                    <li>
                                        <a href="{{ route('cart') }}" class="offcanvas-toggle">
                                            <i class="icon-shopping-cart"></i>
                                            <span class="wishlist-item-count pos-absolute">0</span>
                                        </a>
                                    </li> <!-- End Header Add Cart Box -->

                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- End Header Center area -->

            <!-- Start Header bottom area -->
            <div class="header__bottom p-tb-30">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="header-menu-vertical pos-relative">
                                <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i><a
                                        href="#filterSearch" data-toggle="modal" style="color:white;">Filter</a>
                                </h4>


                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <form class="header-search" action="{{ route('search') }}" method="get">
                                <div class="header-search__content pos-relative">
                                    <input type="text" name="query" placeholder="Search our store">
                                    <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                                </div>

                            </form>
                        </div>
                        <div class="col-xl-2 col-lg-3">
                            <div class="header-phone text-right"><span>Call Us: 123 456 789</span></div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Header bottom area -->

        </div> <!--  End Large Header Section  -->

        <!--  Start Mobile Header Section   -->
        <div class="header__mobile mobile-header--1 d-block d-lg-none p-tb-20">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <ul class="header__mobile--leftside d-flex align-items-center justify-content-start">
                            <li>
                                <div class="header__mobile-logo">
                                    <a href="{{ url('/') }}" class="header__mobile-logo-link">
                                        <img src="{{ $app_logo }}" alt="" class="header__mobile-logo-img">
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <!-- Start User Action -->
                        <ul
                            class="header__mobile--rightside header__user-action-icon  d-flex align-items-center justify-content-end">
                            <!-- Start Header Add Cart Box -->
                            <li><a href="#offcanvas-mobile-menu" class="offcanvas-toggle"><i
                                        class="far fa-bars"></i></a></li>

                        </ul> <!-- End User Action -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="header-menu-vertical pos-relative m-t-30">
                            <h4 class="menu-title link--icon-left"><i class="far fa-align-left"></i><a
                                    href="#filterSearch" data-toggle="modal" style="color:white;">Filter</a>
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!--  Start Mobile Header Section   -->

        <!--  Start Mobile-offcanvas Menu Section   -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <div class="offcanvas__top">
                <span class="offcanvas__top-text"></span>
                <button class="offcanvas-close"><i class="fal fa-times"></i></button>
            </div>

            <div class="offcanvas-inner">
                {{-- <ul class="user-set-role d-flex justify-content-between m-tb-15">
                    <li class="user-currency pos-relative">
                        <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-expanded="false">Select
                            Language<i class="fal fa-chevron-down"></i></a>
                        <ul class="expand-dropdown-menu dropdown-menu">
                            <li><a href="#"><img src="{{ asset('/') }}frontend/assets/img/icon/flag/icon_usa.png"
                                        alt="">English</a></li>
                            <li><a href="#"><img src="{{ asset('/') }}frontend/assets/img/icon/flag/icon_france.png"
                                        alt="">French</a></li>
                        </ul>
                    </li>
                </ul> --}}
                <form class="header-search" action="{{ route('search') }}" method="get">
                    <div class="header-search__content pos-relative">
                        <input type="text" name="query" placeholder="Search our store">
                        <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
                <!-- Start Mobile User Action -->
                <ul class="header__user-action-icon m-tb-15 text-center">
                    <!-- Start Header Wishlist Box -->
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="icon-users"></i>
                        </a>
                    </li> <!-- End Header Wishlist Box -->
                    <!-- Start Header Wishlist Box -->
                    @auth
                        <li>
                            <a href="{{ route('favorites.index') }}">
                                <i class="icon-heart"></i>
                                <span class="item-count pos-absolute">{{ $app_favorites }}</span>
                            </a>
                        </li> <!-- End Header Wishlist Box -->
                        <!-- Start Header Add Cart Box -->
                        <li>
                            <a href="{{ route('cart') }}">
                                <i class="icon-shopping-cart"></i>
                                <span class="wishlist-item-count pos-absolute">{{ $app_carts }}</span>
                            </a>
                        </li> <!-- End Header Add Cart Box -->

                    @endauth

                    @guest
                        <li>
                            <a href="{{ route('favorites.index') }}">
                                <i class="icon-heart"></i>
                                <span class="item-count pos-absolute">0</span>
                            </a>
                        </li> <!-- End Header Wishlist Box -->
                        <!-- Start Header Add Cart Box -->
                        <li>
                            <a href="{{ route('cart') }}" class="offcanvas-toggle">
                                <i class="icon-shopping-cart"></i>
                                <span class="wishlist-item-count pos-absolute">0</span>
                            </a>
                        </li> <!-- End Header Add Cart Box -->

                    @endguest
                </ul> <!-- End Mobile User Action -->
                <div class="offcanvas-menu">
                    <ul>
                        <li><a href="{{ url('/') }}"><span>Home</span></a></li>
                        <li>
                            <a href="#"><span>Shop</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Shop Layout</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-sidebar-grid-left.html">Grid Left Sidebar</a></li>
                                        <li><a href="shop-sidebar-grid-right.html">Grid Right Sidebar</a></li>
                                        <li><a href="shop-sidebar-full-width.html">Full Width</a></li>
                                        <li><a href="shop-sidebar-left-list-view.html">List Left Sidebar</a></li>
                                        <li><a href="shop-sidebar-right-list-view.html">List Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Shop Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="empty-cart.html">Empty Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="{{ route('login') }}">My Account</a></li>
                                        <li><a href="login.html">Login</a></li>

                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Product Single</a>
                                    <ul class="sub-menu">
                                        <li><a href="product-single-default.html">Simple</a></li>
                                        <li><a href="product-single-affiliate.html">Affiliate</a></li>
                                        <li><a href="product-single-group.html">Grouped</a></li>
                                        <li><a href="product-single-variable.html">Variable</a></li>
                                        <li><a href="product-single-tab-left.html">Left Tab</a></li>
                                        <li><a href="product-single-tab-right.html">Right Tab</a></li>
                                        <li><a href="product-single-slider.html">Single Slider</a></li>
                                        <li><a href="product-single-gallery-left.html">Gallery Left</a></li>
                                        <li><a href="product-single-gallery-right.html">Gallery Right</a></li>
                                        <li><a href="product-single-sticky-left.html">Sticky Left</a></li>
                                        <li><a href="product-single-sticky-right.html">Sticky Right</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Blogs</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Blog Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-sidebar-left.html"> Blog Grid Left Sidebar</a></li>
                                        <li><a href="blog-grid-sidebar-right.html"> Blog Grid Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Blog List</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-list-sidebar-left.html"> Blog List Left Sidebar</a></li>
                                        <li><a href="blog-list-sidebar-right.html"> Blog List Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Blog Single</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-single-sidebar-left.html"> Blog Single Left Sidebar</a>
                                        </li>
                                        <li><a href="blog-single-sidebar-right.html"> Blog Single Right Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="frequently-questions.html">Frequently Questions</a></li>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <ul class="offcanvas__social-nav m-t-50">
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i
                            class="fab fa-facebook-f"></i></a></li>
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i
                            class="fab fa-twitter"></i></a></li>
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i
                            class="fab fa-youtube"></i></a></li>
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i
                            class="fab fa-google-plus-g"></i></a></li>
                <li class="offcanvas__social-list"><a href="#" class="offcanvas__social-link"><i
                            class="fab fa-instagram"></i></a></li>
            </ul>
        </div> <!--  End Mobile-offcanvas Menu Section   -->

        <!--  Start Popup Add Cart  -->
        <div id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
            <div class="offcanvas__top">
                <span class="offcanvas__top-text"><i class="icon-shopping-cart"></i>Cart</span>
                <button class="offcanvas-close"><i class="fal fa-times"></i></button>
            </div>
            <!-- Start Add Cart Item Box-->
            <ul class="offcanvas-add-cart__menu">
                <!-- Start Single Add Cart Item-->
                <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between ">
                    <div class="offcanvas-add-cart__content d-flex align-items-start m-r-10">
                        <div class="offcanvas-add-cart__img-box pos-relative">
                            <a href="product-single-default.html"
                                class="offcanvas-add-cart__img-link img-responsive"><img
                                    src="{{ asset('/') }}frontend/assets/img/product/size-small/product-home-1-img-1.jpg"
                                    alt="" class="add-cart__img"></a>
                            <span class="offcanvas-add-cart__item-count pos-absolute">2x</span>
                        </div>
                        <div class="offcanvas-add-cart__detail">
                            <a href="product-single-default.html" class="offcanvas-add-cart__link">Lucky Wooden
                                Elephant</a>
                            <span class="offcanvas-add-cart__price">$29.00</span>
                            <span class="offcanvas-add-cart__info">Dimension: 40x60cm</span>
                        </div>
                    </div>
                    <button class="offcanvas-add-cart__item-dismiss"><i class="fal fa-times"></i></button>
                </li> <!-- Start Single Add Cart Item-->
                <!-- Start Single Add Cart Item-->
                <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between">
                    <div class="offcanvas-add-cart__content d-flex  align-items-start m-r-10">
                        <div class="offcanvas-add-cart__img-box pos-relative">
                            <a href="product-single-default.html"
                                class="offcanvas-add-cart__img-link img-responsive"><img
                                    src="{{ asset('/') }}frontend/assets/img/product/size-small/product-home-1-img-2.jpg"
                                    alt="" class="add-cart__img"></a>
                            <span class="offcanvas-add-cart__item-count pos-absolute">2x</span>
                        </div>
                        <div class="offcanvas-add-cart__detail">
                            <a href="product-single-default.html" class="offcanvas-add-cart__link">Lucky Wooden
                                Elephant</a>
                            <span class="offcanvas-add-cart__price">$29.00</span>
                            <span class="offcanvas-add-cart__info">Dimension: 40x60cm</span>
                        </div>
                    </div>
                    <button class="offcanvas-add-cart__item-dismiss"><i class="fal fa-times"></i></button>
                </li> <!-- Start Single Add Cart Item-->
            </ul> <!-- Start Add Cart Item Box-->
            <!-- Start Add Cart Checkout Box-->
            <div class="offcanvas-add-cart__checkout-box-bottom">
                <!-- Start offcanvas Add Cart Checkout Info-->
                <ul class="offcanvas-add-cart__checkout-info">
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Subtotal</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$60.59</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Shipping</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$7.00</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Taxes</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$0.00</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Total</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$67.59</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                </ul> <!-- End offcanvas Add Cart Checkout Info-->

                <div class="offcanvas-add-cart__btn-checkout">
                    <a href="checkout.html"
                        class="btn btn--block btn--radius btn--box btn--black btn--black-hover-green btn--large btn--uppercase font--bold">Checkout</a>
                </div>
            </div> <!-- End Add Cart Checkout Box-->
        </div> <!-- End Popup Add Cart -->

        <div class="offcanvas-overlay"></div>
    </header> <!-- :::::: End Header Section ::::::  -->

    @yield('content')


    <!-- ::::::  Start  Footer ::::::  -->
    <footer class="footer m-t-100">
        <div class="container">
            <!-- Start Footer Top Section -->
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="{{ url('/') }}" class="footer__logo-link">
                                    <img src="{{ $app_logo }}" alt="" class="footer__logo-img">
                                </a>
                            </div>
                            <ul class="footer__address">
                                <li class="footer__address-item"><i
                                        class="fa fa-home"></i>{{ setting('footer_address') }}</li>
                                <li class="footer__address-item"><i
                                        class="fa fa-phone-alt"></i>{{ setting('footer_phone') }}</li>
                                <li class="footer__address-item"><i
                                        class="fa fa-envelope"></i>{{ setting('footer_email') }}</li>
                            </ul>
                            <ul class="footer__social-nav">
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i
                                            class="fab fa-youtube"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i
                                            class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <!-- Start Footer Nav -->
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">
                                INFORMATION</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="" class="footer__link">Delivery Information</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Advanced Search</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Helps & Faqs</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Store Location</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Orders & Returns</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Deliveries</a></li>
                                <li class="footer__list"><a href="" class="footer__link"> Refund & Returns</a></li>
                            </ul>
                        </div> <!-- End Footer Nav -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">OUR
                                COMPANY</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="" class="footer__link">Delivery</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Legal Notice</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Sitemap</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Secure payment</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Blog</a></li>
                                <li class="footer__list"><a href="" class="footer__link">About us</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Carrers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">MY ACCOUNT
                            </h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="" class="footer__link">Search Terms</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Advanced Search</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Helps & Faqs</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Store Location</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Orders & Returns</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Deliveries</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Refund & Returns</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">OPENING
                                TIME</h4>
                            <ul class="footer__nav">
                                <li class="footer__list">Mon - Fri: 8AM - 10PM</li>
                                <li class="footer__list">Sat: 9AM-8PM</li>
                                <li class="footer__list">Suns: 14hPM-18hPM</li>
                                <li class="footer__list">Mon - Fri: 8AM - 10PM</li>
                                <li class="footer__list">We Work All The Holidays</li>
                                <li class="footer__list"><a href="" class="footer__link font--bold">Download our app</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- End Footer Top Section -->
            <!-- Start Footer Bottom Section -->
            <div class="footer__bottom">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <!-- Start Footer Copyright Text -->

                        <div class="footer__copyright-text">
                            <strong>Copyright © {{ date('Y') }} <a
                                    href="{{ url('/') }}">{{ setting('app_name') }}</a>.</strong> All rights
                            reserved.
                        </div> <!-- End Footer Copyright Text -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Footer Payment Logo -->
                        <div class="footer__payment">
                            <a href="#" class="footer__payment-link">
                                <img src="{{ asset('/') }}frontend/assets/img/company-logo/payment.png" alt=""
                                    class="footer__payment-img">
                            </a>
                        </div> <!-- End Footer Payment Logo -->
                    </div>
                </div>
            </div> <!-- End Footer Bottom Section -->
        </div>
    </footer> <!-- ::::::  End  Footer ::::::  -->



    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    @include('frontend.layouts.media_modal')

    <!-- Vendor JS Files -->
    <script src="{{ asset('/') }}frontend/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/vendor/jquery-ui.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/vendor/bootstrap.bundle.min.js"></script>

    {{-- <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-messaging.js"></script>

    <script type="text/javascript">
        @include('vendor.notifications.init_firebase')

    </script> --}}

    {{-- <script type="text/javascript">
        const messaging = firebase.messaging();
        navigator.serviceWorker.register("{{ url('firebase/sw-js') }}")
            .then((registration) => {
                messaging.useServiceWorker(registration);
                messaging.requestPermission()
                    .then(function() {
                        console.log('Notification permission granted.');
                        getRegToken();

                    })
                    .catch(function(err) {
                        console.log('Unable to get permission to notify.', err);
                    });
                messaging.onMessage(function(payload) {
                    console.log("Message received. ", payload);
                    notificationTitle = payload.data.title;
                    notificationOptions = {
                        body: payload.data.body,
                        icon: payload.data.icon,
                        image: payload.data.image
                    };
                    var notification = new Notification(notificationTitle, notificationOptions);
                });
            });

        function getRegToken(argument) {
            messaging.getToken().then(function(currentToken) {
                    if (currentToken) {
                        saveToken(currentToken);
                        console.log(currentToken);
                    } else {
                        console.log('No Instance ID token available. Request permission to generate one.');
                    }
                })
                .catch(function(err) {
                    console.log('An error occurred while retrieving token. ', err);
                });
        }


        function saveToken(currentToken) {
            $.ajax({
                type: "POST",
                data: {
                    'device_token': currentToken,
                    'api_token': '{!! auth()->user()->api_token !!}'
                },
                url: '{!! url('api/users', ['id' => auth()->id()]) !!}',
                success: function(data) {

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

    </script> --}}

    <!-- Plugins JS Files -->
    <script src="{{ asset('/') }}frontend/assets/js/plugin/slick.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/jquery.countdown.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/material-scrolltop.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/price_range_script.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/in-number.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/venobox.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/jquery.waypoints.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/jquery.lineProgressbar.js"></script>
    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="{{ asset('/') }}frontend/assets/js/vendor/vendor.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/plugin/plugins.min.js"></script> -->

    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('/') }}frontend/assets/js/main.js"></script>
    @stack('scripts')
</body>

</html>
