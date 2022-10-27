@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد اطلاعیه پیامکی</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"> <a href="#">اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item active"> ایجاد اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اطلاعیه پیامکی</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('sms.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">عنوان ایمیل</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="عنوان ایمیل">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ انتشار</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="تاریخ انتشار">
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">محتوا</label>
                                    <textarea name="body" id="" rows="7" class="form-control" placeholder="محتوا"></textarea>
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
