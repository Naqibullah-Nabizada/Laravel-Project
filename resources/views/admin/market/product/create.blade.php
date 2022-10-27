@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد محصول</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">محصولات</a></li>
            <li class="breadcrumb-item active"> ایجاد محصول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش محصول</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row border-bottom">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام محصول</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام محصول">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">دسته محصول</label>
                                    <select name="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        <option value="">کالای الکترونیکی</option>
                                    </select>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">فرم کالا</label>
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
                                    <label class="form-label">وزن</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="وزن">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">قیمت کالا</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="قیمت کالا">
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea name="body" id="body" rows="5" class="form-control"></textarea>
                                </div>

                                <section class="row col-12 border-top p-2 mx-1">
                                    <div class="form-group col-6 col-md-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="ویژگی...">
                                    </div>

                                    <div class="form-group col-6 col-md-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="مقدار...">
                                    </div>
                                </section>

                                <input type="button" class="btn btn-sm btn-success d-block mx-4 mb-2" value="افزودن">

                            </section>

                    </section>

                    <a href="#" class="btn btn-sm btn-primary m-3">ثبت</a>
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
