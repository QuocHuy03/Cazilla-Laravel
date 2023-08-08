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
                    <h3 class="card-title">NHÓM THÀNH VIÊN</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tên Đăng Nhập</th>
                                    <th>Email</th>
                                    <th>Số Địa Chỉ</th>
                                    <th>Level</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ $key }}</td>
                                        <td class="text-center">
                                            {{ $item->username }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->email }}
                                        </td>

                                        <td class="text-center">
                                            {{ $item->number }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->level }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.users.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.users.edit', $item->id) }}"
                                                class="btn btn-primary">Edit</a>
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
