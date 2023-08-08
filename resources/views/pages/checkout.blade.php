@extends('app')
@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('/') }}"><i
                                    class="ci-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap"><a href="{{ route('/') }}">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Checkout</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-12">
                <!-- Steps-->
                <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="{{ route('listCart') }}">
                        <div class="step-progress"><span class="step-count">1</span></div>
                        <div class="step-label"><i class="ci-cart"></i>Cart</div>
                    </a><a class="step-item active current" href="{{ route('showOrder') }}">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="ci-user-circle"></i>Details</div>
                    </a><a class="step-item" href="{{ route('showPayment') }}">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-package"></i>Payment</div>
                    </a><a class="step-item" href="{{ route('showOrders') }}">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Orders</div>
                    </a><a class="step-item" href="#">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Detail</div>
                    </a></div>
                <!-- Autor info-->
                @guest
                    <h4 style="color:red" class="text-center">Bạn cần phải đăng ký</h4>
                @else
                    <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                        <div class="d-flex align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span
                                    class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
                                    title="Reward points">{{ Cart::count() }}</span><img class="rounded-circle"
                                    src="https://graph.facebook.com/100079001881279/picture?width=500&height=500&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662"
                                    width="90" alt="{{ Auth::user()->name }}"></div>
                            <div class="ps-3">
                                <h3 class="fs-base mb-0">{{ Auth::user()->name }}</h3><span
                                    class="text-accent fs-sm">{{ Auth::user()->email }}</span>
                            </div>
                        </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="{{ route('showProfile') }}"><i
                                class="ci-edit me-2"></i>Edit profile</a>
                    </div>
                @endguest

                <!-- Shipping address-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-fn">Full Name</label>
                            <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}"
                                disabled id="checkout-fn">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-email">E-mail Address</label>
                            <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}"
                                disabled id="checkout-email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-address">Address</label>
                            <input class="form-control" type="text" name="address" value="{{ Auth::user()->address }}"
                                disabled id="checkout-address">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-phone">Phone Number</label>
                            <input class="form-control" type="number" name="number"
                                value="{{ Auth::user()->number }}" disabled id="checkout-phone">
                        </div>
                    </div>
                </div>
                <h6 class="mb-3 py-3 border-bottom">Billing address</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="same-address">
                    <label class="form-check-label" for="same-address">Same as shipping address</label>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('listCart') }}"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="{{ route('showPayment') }}"><span class="d-none d-sm-inline">Proceed to
                                Payment</span><span class="d-inline d-sm-none">Next</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </section>
        
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('listCart') }}"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="{{ route('showPayment') }}"><span class="d-none d-sm-inline">Proceed to
                                Payment</span><span class="d-inline d-sm-none">Next</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
