@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد ادمین جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#">کاربران ادمین</a></li>
            <li class="breadcrumb-item active"> اضافه نمودن امین جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اضافه نمودن ادمین جدید</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin-user.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام خانوادگی">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="email" class="form-control form-control-sm" placeholder="ایمیل">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">موبایل</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="موبایل">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">رمز عبور</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="رمز عبور">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تکرار رمز عبور</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="تکرار رمز عبور">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" placeholder="تصویر">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت کاربر</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="">وضعیت کاربر</option>
                                        <option value="">فعال</option>
                                        <option value="">غیر فعال</option>
                                    </select>
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
