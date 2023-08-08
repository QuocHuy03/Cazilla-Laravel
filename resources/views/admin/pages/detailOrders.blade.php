@extends('admin.layouts.app')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">NHÓM LIST ORDERS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Ảnh Sản Phẩm</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Sản Phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails as $key => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key }}
                                        </td>
                                        <td class="text-center">
                                            <img style="width:80px" src="{{ $item->product_img }}" alt="">
                                        </td>
                                        <td class="text-center">
                                            {{ $item->product_name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->product_qty }}
                                        </td>
                                        <td class="text-center">
                                            {{ number_format($item->product_price, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    VUI LÒNG THAO TÁC CẨN THẬN
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
