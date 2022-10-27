@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد منوی جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">منو</a></li>
            <li class="breadcrumb-item active"> ایجاد منوی جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش منوی سایت</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام منو</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام منو">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">منوی والد</label>
                                    <select name="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        <option value="">کالای الکترونیکی</option>
                                    </select>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">لینک منو</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="لینک منو">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر منو</label>
                                    <input type="file" class="form-control form-control-sm" placeholder="تصویر منو">
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
