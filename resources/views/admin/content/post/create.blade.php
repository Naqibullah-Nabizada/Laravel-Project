@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پست جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">پست</a></li>
            <li class="breadcrumb-item active"> ایجاد پست جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش پست ها</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">عنوان پست</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="عنوان پست">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">دسته پست</label>
                                    <select name="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        <option value="">کالای الکترونیکی</option>
                                    </select>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" class="form-control form-control-sm">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ انتشار</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام برند">
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">متن پست</label>
                                    <textarea name="body" id="body" rows="7" class="form-control" placeholder="متن پست"></textarea>
                                </div>

                            </section>

                            <a href="#" class="btn btn-sm btn-primary">ثبت</a>
                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
