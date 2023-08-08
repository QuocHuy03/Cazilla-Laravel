@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <section class="col-lg-12 connectedSortable">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa Danh Mục</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.category.edit.post', $category->id) }}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" value="{{ $category->nameCategory }}" name="nameCategory" id="slug"
                                onkeyup="ChangeToSlug()" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" value="{{ $category->slug }}" id="convert_slug" name="slug"
                                class="form-control">
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                        </div>
                </form>
            </div>
        </section>

    </div>
@endsection
