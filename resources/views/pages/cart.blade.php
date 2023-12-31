@extends('app')
@section('content')
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Your cart</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- List of items-->
            <section class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                    <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2"
                        href="shop-grid-ls.html"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
                </div>
                <!-- Item-->
                @if (Cart::count() > 0)
                    <form action="{{ route('cartUpdate') }}" method="post">
                        @csrf
                        @foreach (Cart::content() as $item)
                            <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                                <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
                                        class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img
                                            src="{{ $item->options->thumbnail }}" width="160" alt="Product"></a>
                                    <div class="pt-2">
                                        <h3 class="product-title fs-base mb-2"><a
                                                href="shop-single-v1.html">{{ $item->name }}</a>
                                        </h3>
                                        <div class="fs-lg text-accent pt-2">{{ number_format($item->total, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start"
                                    style="max-width: 9rem;">
                                    <label class="form-label" for="quantity1">Quantity</label>
                                    <input class="form-control" type="number" name="qty[{{ $item->rowId }}]"
                                        id="quantity1" min="1" value="{{ $item->qty }}">

                                    <a href="{{ route('removeCart', $item->rowId) }}" class="btn btn-link px-0 text-danger"
                                        type="button"><i class="ci-close-circle me-2"></i><span
                                            class="fs-sm">Remove</span></a>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Item-->
                        <button class="btn btn-outline-accent d-block w-100 mt-4" type="submit"><i
                                class="ci-loading fs-base me-2"></i>Update cart</button>
                    </form>
                @else
                    <div class="text-center">
                        <img src="https://mer.vn/public/theme/imgs/shop/empty-cart.svg" alt="">
                    </div>
                    <div class="text-center">
                        <a href="{{ route('/') }}" class="btn btn-danger">Tiếp Tục Mua Hàng</a>
                    </div>
                @endif
            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4">
                    <div class="py-2 px-xl-2">
                        <div class="text-center mb-4 pb-3 border-bottom">
                            <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                            <h3 class="fw-normal">{{ Cart::total() }}</h3>
                        </div>
                        <form action="{{ route('addOrder') }}" method="post">
                            @csrf
                            <div class="text-center mb-4 pb-3 border-bottom">
                                <h2 class="h6 mb-3 pb-1">Mã giảm giá</h2>
                                <form class="needs-validation pb-2" method="post">
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Nhập mã giảm giá"
                                            name="coupon">
                                    </div>
                                    <div style="color:red" id="result_coupon"></div>
                                    <button class="btn btn-secondary d-block w-100" onclick="checkCoupon()"
                                        name="apply_coupon" type="button">Áp dụng</button>
                               
                            </div>
                            <button type="submit" class="btn btn-primary btn-shadow d-block w-100 mt-4"><i
                                    class="ci-card fs-lg me-2"></i>Xác Nhận</button>
                        </form>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    </main>
@endsection
