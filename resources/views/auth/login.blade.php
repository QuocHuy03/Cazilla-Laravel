@extends('app')
@section('content')
    <section id="form">
        <!--form-->
        <div class="container py-4 py-lg-5 my-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="h4 mb-1">Login</h2>
                            <div class="py-3">
                                <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
                                <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2"
                                        href="#" data-bs-toggle="tooltip" title="Sign in with Google"><i
                                            class="ci-google"></i></a><a class="btn-social bs-facebook me-2 mb-2"
                                        href="#" data-bs-toggle="tooltip" title="Sign in with Facebook"><i
                                            class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2"
                                        href="#" data-bs-toggle="tooltip" title="Sign in with Twitter"><i
                                            class="ci-twitter"></i></a></div>
                            </div>
                            <hr>
                            <form class="needs-validation"method="POST" action="{{ route('auth.login.post') }}">
                                @csrf
                                
                                <h3 class="fs-base pt-4">Username</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <input class="form-control rounded-start"
                                        type="text" name="username" id="username" placeholder="Nhập tài khoản">
                                </div>
                            

                                <h3 class="fs-base">Password</h3>
                                <div class="input-group mb-3"><i
                                        class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                                    <div class="password-toggle w-100">
                                        <input class="form-control" name="password"
                                            type="password" id="password" placeholder="Nhập mật khẩu">
                                        <label class="password-toggle-btn" aria-label="Show/hide password">
                                            <input class="password-toggle-check" type="checkbox"><span
                                                class="password-toggle-indicator"></span>
                                        </label>
                                    </div>
                                  
                                </div>
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked id="remember_me"
                                            name="remember_me">
                                        <label class="form-check-label" for="remember_me">Remember me</label>
                                    </div><a class="nav-link-inline fs-sm" href="#">Forgot password?</a>
                                </div>
                                <hr class="mt-4">
                                <div class="text-end pt-4">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ci-sign-in me-2 ms-n21"></i>Đăng nhập</button>
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

