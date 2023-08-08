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
                        <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
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
                    </a><a class="step-item active" href="{{ route('showOrder') }}">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="ci-user-circle"></i>Details</div>
                    </a><a class="step-item active" href="{{ route('showPayment') }}">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-package"></i>Payment</div>
                    </a><a class="step-item active" href="{{ route('showOrders') }}">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Orders</div>
                    </a><a class="step-item active current" href="#">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Detail</div>
                    </a></div>
                <!-- Order details-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>
                <!-- Item-->
                @foreach ($products_orders as $item)
                    <div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
                        <div class="d-sm-flex text-center text-sm-start"><a
                                class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img
                                    src="{{ $item->product_img }}" width="160" alt="{{ $item->product_name }}"></a>
                            <div class="pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{ $item->product_name }}</a>
                                </h3>
                                <div class="fs-lg text-accent pt-2">{{ number_format($item->product_price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
                            <p class="mb-0"><span
                                    class="text-muted fs-sm">Quantity:</span><span>{{ $item->product_qty }}</span></p>
                            <button class="btn btn-link px-0" type="button"><i class="ci-edit me-2"></i><span
                                    class="fs-sm">Delete</span></button>
                        </div>
                    </div>
                @endforeach
                <!-- End Item -->
                <!-- Client details-->
                <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="h6">Shipping to:</h4>
                            <ul class="list-unstyled fs-sm">
                                <li><span class="text-muted">Full Name : </span>{{ Auth::user()->name }}</li>
                                <li><span class="text-muted">Address : </span>{{ Auth::user()->address }}</li>
                                <li><span class="text-muted">Phone : </span>{{ Auth::user()->number }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="h6">Payment method:</h4>
                            <ul class="list-unstyled fs-sm">
                                <li><span class="text-muted">Credit Card: </span>{{ $credits->number_card }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('showPayment') }}"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="{{ route('showComplete') }}"><span class="d-none d-sm-inline">Complete
                                order</span><span class="d-inline d-sm-none">Complete</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </section>
        
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100"
                            href="{{ route('showPayment') }}"><i class="ci-arrow-left mt-sm-0 me-1"></i><span
                                class="d-none d-sm-inline">Back to
                                Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="{{ route('showComplete') }}"><span class="d-none d-sm-inline">Complete
                                order</span><span class="d-inline d-sm-none">Complete</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
