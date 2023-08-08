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
                    <h3 class="card-title">NHÓM SẢN PHẨM</h3>
                    <div class="text-right">
                        <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default"
                            class="btn btn-info">TẠO SẢN PHẨM</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Hình Ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Slug</th>
                                    <th>Giá</th>
                                    <th>Mô Tả Sản Phẩm</th>
                                    <th>Danh Mục Sản Phẩm</th>
                                    <th>Xóa</th>
                                    <th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ $key }}</td>
                                        <td class="text-center">
                                            <img style="width:80px" src="{{ $item->imgProducts }}">
                                        </td>
                                        <td class="text-center">
                                            {{ $item->nameProducts }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->slug }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->priceProducts }}
                                        </td>

                                        <td class="text-center">
                                            {{ $item->category->nameCategory }}
                                        </td>
                                        <td class="text-center">
                                            {!! $item->descProducts !!}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.products.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.products.edit', $item->id) }}"
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
    <!-- /.row huydeV -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Sản Phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{ route('admin.products.post') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>
                            <input type="text" class="form-control" name="imgProducts" placeholder="Nhập Link Ảnh"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="nameProducts" id="slug"
                                onkeyup="ChangeToSlug()" placeholder="Nhập Tên Sản Phẩm" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="convert_slug" name="slug"
                                placeholder="Tự Động" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                            <input type="number" class="form-control" name="priceProducts" placeholder="Nhập Giá Sản Phẩm"
                                required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">THỂ LOẠI</label>
                            <select class="custom-select" name="product_cat_id">
                                <option value="0">----- Chọn Danh Mục -----</option>
                                @foreach ($category as $key => $huyCategory)
                                    <option value="{{ $huyCategory->id }}">{{ $huyCategory->nameCategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô Tả Sản Phẩm</label>
                            <textarea name="descProducts" placeholder="Nhập Mô tả" class="textarea" required=""></textarea>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
