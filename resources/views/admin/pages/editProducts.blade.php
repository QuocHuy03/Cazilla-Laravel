@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <section class="col-lg-12 connectedSortable">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa Sản Phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.products.edit.post', $products->id) }}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" value="{{ $products->nameProducts }}" id="slug"
                                onkeyup="ChangeToSlug()" name="nameProducts" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" value="{{ $products->slug }}" id="convert_slug" name="slug"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>
                            <input type="text" value="{{ $products->imgProducts }}" name="imgProducts"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price Sản Phẩm</label>
                            <input type="text" value="{{ $products->priceProducts }}" name="priceProducts"
                                class="form-control">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Sản Phẩm</label>
                            <select class="custom-select" name="product_cat_id">
                                @foreach ($category as $key => $huyCategory)
                                    <option {{ $huyCategory->id == $products->product_cat_id ? 'selected' : 'huydev' }}
                                        value="{{ $huyCategory->id }}">{{ $huyCategory->category }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô Tả Sản Phẩm</label>
                            <textarea name="descProducts" class="form-control" required="">{!! $products->descProducts !!}</textarea>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                        </div>
                </form>
            </div>
        </section>

    </div>
@endsection
