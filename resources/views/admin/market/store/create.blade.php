@extends('admin.layouts.master')

@section('head-tag')
    <title>اضافه کردن به انبار</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">انبار</a></li>
            <li class="breadcrumb-item active"> افافه کردن به انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اضافه کردن به انبار</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('store.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام تحویل گیرنده</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام تحویل گیرنده">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام تحویل دهنده</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام تحویل دهنده">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تعداد</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="تعداد">
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea name="" id="" rows="5" class="form-control"></textarea>
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
