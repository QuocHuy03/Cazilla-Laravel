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
                    </a><a class="step-item active current" href="{{ route('showOrders') }}">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Orders</div>
                    </a><a class="step-item" href="#">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Detail</div>
                    </a></div>
                <!-- Shipping methods table-->
                <h2 class="h6 pb-3 mb-2">Orders</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Code</th>
                                <th>Datetime</th>
                                <th>Delivery</th>
                                <th>Status</th>
                                <th>Manipulation</th>
                            </tr>

                            @foreach ($order_huydev as $key => $items)
                                <tr class="text-center" style="font-weight: 700;">
                                    <td scope="row">
                                        <pre>{{ $key }}</pre>
                                    </td>
                                    <td>
                                        <pre>{{ $items->random_order }}</pre>
                                    </td>
                                    <td>
                                        <pre>{{ $items->created_at }}</pre>
                                    </td>
                                    <td>
                                        <pre><?php if ($items['status_order'] == 'Processed') { ?>Huy Đang Xử Lý<?php }elseif($items['status_order'] == 'Delivering') {?>Đã Giao Hàng (Đợi Phản Hồi)
                                        <?php }else { ?> Đã Nhận Hàng Thành Công<?php } ?></pre>
                                    </td>
                                    <td>
                                        <?php if ($items['status_order'] == 'Delivering') { ?>
                                        <pre> <a class='btn btn-info' href="{{ route('statusComplete', $items->id) }}">Đã Nhận Hàng</a></pre>
                                        <?php }else{ ?>
                                        <pre style="{{ $items->status_order == 'Complete' ? 'color:#5eb87d' : 'color:red' }}">{{ $items->status_order }}</pre>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <pre> <a class="btn btn-primary" href="{{ route('showReviews', $items->random_order) }}">Chi Tiết</a></pre>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                {{-- <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('showPayment') }}"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="{{ route('showReview') }}"><span
                                class="d-none d-sm-inline">Proceed to
                                Detail</span><span class="d-inline d-sm-none">Next</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div> --}}
            </section>

        </div>
        <!-- Navigation (mobile)-->
        {{-- <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100"
                            href="{{ route('showPayment') }}"><i class="ci-arrow-left mt-sm-0 me-1"></i><span
                                class="d-none d-sm-inline">Back to
                                Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="{{ route('showReview') }}"><span class="d-none d-sm-inline">Proceed to
                                Detail</span><span class="d-inline d-sm-none">Next</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    </main>
@endsection
