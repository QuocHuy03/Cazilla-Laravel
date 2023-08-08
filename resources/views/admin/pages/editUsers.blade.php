@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <section class="col-lg-12 connectedSortable">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa Thành Viên</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.users.edit.post', $users->id) }}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Đăng Nhập</label>
                            <input type="text" value="{{ $users->username }}" name="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" value="{{ $users->email }}" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Điện Thoại</label>
                            <input type="text" value="{{ $users->number }}" name="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level</label>
                            <select class="custom-select" name="level">
                                <option value="member">Thành Viên</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                        </div>
                </form>
            </div>
        </section>

    </div>
@endsection
