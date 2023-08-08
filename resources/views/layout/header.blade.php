<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ecommerce | Store</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="QuocHuyDev">
    <meta name="keywords" content="bootstrap, shop, e-commerce">
    <!-- Viewport-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/tiny-slider.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/drift-basic.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/card.css') }}" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="https://cartzilla.createx.studio/css/theme.min.css">
    {{-- <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/theme.min.css') }}"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
    alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<!-- Body-->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap');

    body {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 18px;
    }
</style>

<body class="handheld-toolbar-enabled">

    <main class="page-wrapper">
        <!-- Navbar Electronics Store-->
        <header class="shadow-sm">

            <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
            <div class="navbar-sticky bg-light">
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="container"><a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0"
                            href="index.html"><img src="https://cartzilla.createx.studio/img/logo-dark.png"
                                width="142" alt="Cartzilla"></a><a class="navbar-brand d-sm-none me-2"
                            href="index.html"><img src="img/logo-icon.png" width="74" alt="Cartzilla"></a>
                        <!-- Search-->
                        <div class="input-group d-none d-lg-flex flex-nowrap mx-4"><i
                                class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input class="form-control rounded-start w-100" type="text"
                                placeholder="Search for products">
                            <select class="form-select flex-shrink-0" style="width: 10.5rem;">
                                <option>All categories</option>
                                @foreach ($category as $item)
                                    <option>{{ $item->nameCategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Toolbar-->

                        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a
                                class="navbar-tool navbar-stuck-toggler" href="#"><span
                                    class="navbar-tool-tooltip">Toggle menu</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                            </a>


                            <div class="navbar-tool dropdown">
                                <!-- Cart dropdown-->
                                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#">
                                    <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                    <div class="navbar-tool-text ms-n3"><small>Hello, Sign in</small>My Account</div>
                                </a>
                                @guest
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('auth.login') }}">Login</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('auth.register') }}">Register</a></li>
                                    </ul>
                                @else
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item"
                                                href="{{ route('showProfile') }}">{{ Auth::user()->name }}</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a></li>
                                    </ul>
                                @endguest
                            </div>
                            <div class="navbar-tool dropdown ms-3"><a
                                    class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                    href="{{ route('listCart') }}"><span class="navbar-tool-label">{{ Cart::count() }}</span><i
                                        class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text"
                                    href="{{ route('listCart') }}"><small>My Cart</small>{{ Cart::total() }}</a>
                                <!-- Cart dropdown-->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                        <div data-simplebar data-simplebar-auto-hide="false">
                                            {{-- item --}}
                                            @if (Cart::count() > 0)
                                                @foreach (Cart::content() as $item)
                                                    <div class="widget-cart-item pb-2 border-bottom">
                                                        <a a href="{{ route('removeCart', $item->rowId) }}"
                                                            class="btn-close text-danger"><span
                                                                aria-hidden="true">&times;</span></a>
                                                        <div class="d-flex align-items-center"><a
                                                                class="d-block flex-shrink-0" href="#"><img
                                                                    src="{{ $item->options->thumbnail }}"
                                                                    width="64" alt="{{ $item->name }}"></a>
                                                            <div class="ps-2">
                                                                <h6 class="widget-product-title"><a
                                                                        href="#">{{ $item->name }}</a>
                                                                </h6>
                                                                <div class="widget-product-meta"><span
                                                                        class="text-accent me-2">{{ number_format($item->total, 0, ',', '.') }}</span><span
                                                                        class="text-muted">x
                                                                        {{ $item->qty }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-center"style="color:red">K Có Sản Phẩm</p>
                                            @endif

                                            {{-- end item --}}
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                            <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal
                                                    :</span><span
                                                    class="text-accent fs-base ms-1">{{ Cart::total() }}</span>
                                            </div><a class="btn btn-outline-secondary btn-sm"
                                                href="{{ route('listCart') }}">Expand cart<i
                                                    class="ci-arrow-right ms-1 me-n1"></i></a>
                                        </div><a class="btn btn-primary btn-sm d-block w-100"
                                            href="{{ route('showOrder') }}"><i
                                                class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <a href="{{ route('auth.logout') }}">Logout</a> --}}
                    </div>
                </div>
                <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <!-- Search-->
                            <div class="input-group d-lg-none my-3"><i
                                    class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <input class="form-control rounded-start" type="text"
                                    placeholder="Search for products">
                            </div>
                            <!-- Departments menu-->
                            <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0"
                                        href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                            class="ci-menu align-middle mt-n1 me-2"></i>Category</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($category as $item)
                                            <li class="dropdown mega-dropdown">
                                                <a class="dropdown-item dropdown-toggle"
                                                    href="{{ route('products', [$item->slug, $item->id]) }}">
                                                    {{ $item->nameCategory }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <!-- Primary menu-->
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown active"><a class="nav-link" href="{{ route('/') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link"
                                        href="{{ route('showOrders') }}">Order</a>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link" href="#">Pages</a>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link" href="#">Blog</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
