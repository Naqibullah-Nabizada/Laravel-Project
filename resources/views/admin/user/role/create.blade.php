@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد نقش جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#">مشتریان</a></li>
            <li class="breadcrumb-item active"> ایجاد نقش جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>ایجاد نقش جدید</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('role.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">

                                <div class="form-group col-12 col-md-5">
                                    <label class="form-label">نام</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام">
                                </div>

                                <div class="form-group col-12 col-md-5">
                                    <label class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام خانوادگی">
                                </div>

                                <div class="col-12 col-md-2 my-md-auto">
                                    <a href="#" class="btn btn-sm btn-primary">ثبت</a>
                                </div>

                                <section class="col-12">
                                    <div class="row border-top p-2">
                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check1" class="form-check-input" checked>
                                            <label for="check1" class="form-check-label mr-4 mx-1">نمایش دسته جدید</label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check2" class="form-check-input" checked>
                                            <label for="check2" class="form-check-label mr-4 mx-1">ایجاد دسته جدید</label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check3" class="form-check-input" checked>
                                            <label for="check3" class="form-check-label mr-4 mx-1">ویرایش دسته جدید</label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check4" class="form-check-input" checked>
                                            <label for="check4" class="form-check-label mr-4 mx-1">حذف دسته جدید</label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check5" class="form-check-input" checked>
                                            <label for="check5" class="form-check-label mr-4 mx-1">نمایش کالای جدید</label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check6" class="form-check-input" checked>
                                            <label for="check6" class="form-check-label mr-4 mx-1">ایجاد کالای جدید</label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check7" class="form-check-input" checked>
                                            <label for="check7" class="form-check-label mr-4 mx-1">ویرایش کالای جدید</label>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="checkbox" name="" id="check8" class="form-check-input" checked>
                                            <label for="check8" class="form-check-label mr-4 mx-1">حذف کالای جدید</label>
                                        </div>
                                    </div>
                                </section>

                            </section>

                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
