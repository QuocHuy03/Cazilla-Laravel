@extends('app')
@section('content')
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a>
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
                    </a><a class="step-item active current" href="{{ route('showPayment') }}">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-package"></i>Payment</div>
                    </a><a class="step-item" href="{{ route('showOrders') }}">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Orders</div>
                    </a><a class="step-item" href="#">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Detail</div>
                    </a></div>
                <!-- Payment methods accordion-->
                <h2 class="h6 pb-3 mb-2">Choose payment method</h2>
                <div class="accordion mb-2" id="payment-method">
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button" href="#card" data-bs-toggle="collapse"><i
                                    class="ci-card fs-lg me-2 mt-n1 align-middle"></i>Pay with
                                Credit Card</a></h3>
                        <div class="accordion-collapse collapse show" id="card" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p class="fs-sm">We accept following credit cards: <img class="d-inline-block align-middle"
                                        src="https://cartzilla.createx.studio/img/cards.png" width="187"
                                        alt="Cerdit Cards"></p>
                                <div class="credit-card-wrapper"></div>
                                <form action="{{ route('addCredit') }}" method="post" class="credit-card-form row">
                                    @csrf
                                    <div class="mb-3 col-sm-6">
                                        <input class="form-control" type="text" name="number"
                                            value="<?php if (isset($credits->number_card)) {
                                                echo $credits->number_card;
                                            } ?>" placeholder="Card Number" required>
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <input class="form-control" value="<?php if (isset($credits->name_card)) {
                                            echo $credits->name_card;
                                        } ?>" type="text"
                                            name="name" placeholder="Full Name" required>
                                    </div>
                                    <div class="mb-3 col-sm-3">
                                        <input class="form-control" type="text" name="expiry" placeholder="MM/YY"
                                            value="<?php if (isset($credits->date_card)) {
                                                echo $credits->date_card;
                                            } ?>" required>
                                    </div>
                                    <div class="mb-3 col-sm-3">
                                        <input class="form-control" type="text" name="cvc" placeholder="CVC"
                                            value="<?php if (isset($credits->cvc_card)) {
                                                echo $credits->cvc_card;
                                            } ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn btn-outline-primary d-block w-100 mt-0" type="submit"
                                            <?= isset($credits->cvc_card) ? 'disabled' : '' ?>>Liên
                                            Kết</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('showOrder') }}"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Address</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="{{ route('showOrders') }}"><span class="d-none d-sm-inline">Review your
                                Orders</span><span class="d-inline d-sm-none">Review
                                order</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
                </div>
            </section>
     
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('showOrder') }}"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Address</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100"
                            href="{{ route('showOrders') }}"><span class="d-none d-sm-inline">Review your
                                Orders</span><span class="d-inline d-sm-none">Review
                                order</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
