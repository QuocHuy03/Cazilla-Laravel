@extends('app')
@section('content')
    <section id="form">
        <div class="container py-4 py-lg-5 my-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="h4 mb-1">Đăng ký</h2>
                            <hr>
                            <form method="post" action="{{ route('auth.register.post') }}" class="needs-validation">
                                @csrf
                                <div class="intro-x mt-8">
                              
                                </div>
                                <h3 class="fs-base pt-4">Họ Và Tên</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-user position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <input class="form-control rounded-start" type="text" name="name" id="name"
                                        placeholder="Họ Và Tên">
                                </div>
                                <h3 class="fs-base">Tài Khoản</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-phone position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>

                                    <input class="form-control rounded-start" type="text" name="username" id="username"
                                        placeholder="Tài Khoản" />

                                </div>
                                <h3 class="fs-base">Số Điện Thoại</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-phone position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <input class="form-control rounded-start" type="number" name="number" id="number" placeholder="Số Điện Thoại">
                                </div>
                                <h3 class="fs-base">Email</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <input class="form-control rounded-start" type="email" name="email" id="email"
                                        placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                </div>
                                <h3 class="fs-base">Address</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-address position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <input class="form-control rounded-start" type="text" name="address" id="address"
                                        placeholder="Address">
                                </div>
                                <h3 class="fs-base">Mật khẩu</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <div class="password-toggle w-100">
                                        <input class="form-control" type="password" id="password" name="password"
                                            placeholder="Nhập mật khẩu">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" type="checkbox"><span
                                                class="password-toggle-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <h3 class="fs-base">Nhập lại mật khẩu</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <div class="password-toggle w-100">
                                        <input class="form-control" type="password" name="password_confirmation"
                                            id="password_confirmation" placeholder="Nhập mật khẩu">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" type="checkbox"><span
                                                class="password-toggle-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="text-end pt-4">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ci-sign-in me-2 ms-n21"></i>Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/form-->
@endsection
