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
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Tình Trạng</th>
                                    <th>Ngày Đặt</th>
                                    <th>Xác Nhận</th>
                                    <th>Chi Tiết Đơn Hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->random_order }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->users->username }}
                                        </td>
                                        <td class="text-center"
                                            style="font-weight:bold;
                                            <?php if ($item['status_order'] == 'Processed') { ?>
                                                color:red;
                                            <?php }elseif ($item['status_order'] == 'Delivering') { ?>
                                                color:#d51ac0;
                                            <?php }else { ?>
                                                color:#66CC33;
                                                <?php } ?>">
                                            {{ $item->status_order }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->created_at }}
                                        </td>
                                        <td class="text-center">
                                            <?php if ($item['status_order'] == 'Processed') { ?>
                                            <a class='btn btn-danger' href="{{ route('statusDelivering', $item->id) }}">Giao
                                                Hàng</a>
                                            <?php }elseif ($item['status_order'] == 'Complete') { ?>
                                            <button class='btn btn-success' disabled">Khách Hàng Đã Nhận</button>
                                            <?php } else { ?>
                                            <button class='btn btn-info' disabled">Đợi Phản Hồi (Click Từ Khách
                                                Hàng)</button>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <a class='btn btn-primary'
                                                href="{{ route('detailOrders', $item->random_order) }}">Chi
                                                tiết</a>
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
