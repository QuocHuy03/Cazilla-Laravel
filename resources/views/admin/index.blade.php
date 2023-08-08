@extends('admin.layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col-sm-6">
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-3">
            <div class="card card-service box-service-panel">
                <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                    title="Trao đổi người theo dõi profile để kiếm tiền.">
                    <div class="box-body text-center">
                        <a>Sản Phẩm </a><br>
                        <h3>{{ $products }}</h3>
                        <hr>
                        <a rel="nofollow" href="{{ route('admin.pages.products') }}"><button
                                class="btn btn-danger btn-block">Xem
                                Ngay</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-3">
            <div class="card card-service box-service-panel">
                <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                    title="Trao đổi người theo dõi profile để kiếm tiền.">
                    <div class="box-body text-center">
                        <a>Đơn Hàng </a><br>
                        <h3>{{$orders}}</h3>

                        <hr>
                        <a rel="nofollow" href="{{ route('admin.pages.products') }}"><button
                                class="btn btn-success btn-block">Xem
                                Ngay</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-3">
            <div class="card card-service box-service-panel">
                <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                    title="Trao đổi người theo dõi profile để kiếm tiền.">
                    <div class="box-body text-center">
                        <a>Thành Viên </a><br>
                        <h3>{{ $users }}</h3>
                        <hr>
                        <a rel="nofollow" href="{{ route('admin.pages.products') }}"><button
                                class="btn btn-info btn-block">Xem
                                Ngay</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-3">
            <div class="card card-service box-service-panel">
                <div class="card-body" data-toggle="tooltip" data-placement="bottom"
                    title="Trao đổi người theo dõi profile để kiếm tiền.">
                    <div class="box-body text-center">
                        <a>Thành Viên Hôm Nay </a><br>
                        <h3>{{ $users_today }}</h3>
                        <hr>
                        <a rel="nofollow" href="{{ route('admin.pages.products') }}"><button
                                class="btn btn-primary btn-block">Xem
                                Ngay</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#datatable2").DataTable({
                "responsive": false,
                "autoWidth": false,
            });
        });
    </script>
@endsection
