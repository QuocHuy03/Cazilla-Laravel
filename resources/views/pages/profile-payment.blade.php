@extends('app')
@section('content')
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('/') }}"><i
                                    class="ci-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">My orders</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
                <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
                    <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
                        <div class="d-md-flex align-items-center">
                            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0"
                                style="width: 6.375rem;"><span class="badge bg-warning position-absolute end-0 mt-n2"
                                    data-bs-toggle="tooltip" title="Reward points">{{ Cart::count() }}</span><img
                                    class="rounded-circle"
                                    src="https://graph.facebook.com/100079001881279/picture?width=500&height=500&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662"
                                    alt="{{ Auth::user()->name }}"></div>
                            <div class="ps-md-3">
                                <h3 class="fs-base mb-0">{{ Auth::user()->name }}</h3><span
                                    class="text-accent fs-sm">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu"
                            data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
                    </div>
                    <div class="d-lg-block collapse" id="account-menu">
                        <div class="bg-secondary px-4 py-3">
                            <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="border-bottom mb-0"><a
                                    class="nav-link-style d-flex align-items-center px-4 py-3 active"
                                    href="{{ route('showProfileOrder') }}"><i class="ci-bag opacity-60 me-2"></i>Orders<span
                                        class="fs-sm text-muted ms-auto">{{ $order_profile }}</span></a></li>
                        </ul>
                        <div class="bg-secondary px-4 py-3">
                            <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                    href="{{ route('showProfile') }}"><i class="ci-user opacity-60 me-2"></i>Profile
                                    info</a></li>
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                    href="{{ route('showProfileAddress') }}"><i
                                        class="ci-location opacity-60 me-2"></i>Addresses</a>
                            </li>
                            <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                    href="{{ route('showProfilePayment') }}"><i class="ci-card opacity-60 me-2"></i>Payment
                                    methods</a>
                            </li>
                            <li class="d-lg-none border-top mb-0"><a
                                    class="nav-link-style d-flex align-items-center px-4 py-3"
                                    href="{{ route('auth.logout') }}"><i class="ci-sign-out opacity-60 me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="fs-base text-light mb-0">Primary payment method is used by default</h6><a
                        class="btn btn-primary btn-sm" href="account-signin.html"><i class="ci-sign-out me-2"></i>Sign
                        out</a>
                </div>
                <!-- Payment methods list-->
                <div class="table-responsive fs-md mb-4">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Your credit / debit cards</th>
                                <th>Name on card</th>
                                <th>Expires on</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show_payment as $item)
                                <tr>
                                    <td class="py-3 align-middle">
                                        <div class="d-flex align-items-center"><img
                                                src="https://cartzilla.createx.studio/img/card-visa.png" width="39"
                                                alt="Visa">
                                            <div class="ps-2">
                                                {{ $item->number_card }}</div>
                                        </div>
                                    </td>
                                    <td class="py-3 align-middle">{{ $item->name_card }}</td>
                                    <td class="py-3 align-middle">{{ $item->date_card }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
    </main>
@endsection
