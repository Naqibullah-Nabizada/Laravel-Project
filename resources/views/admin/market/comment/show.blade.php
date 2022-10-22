@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش نظرات</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">نظرات</a></li>
            <li class="breadcrumb-item active"> نمایش نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش نظرات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('comment.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>

                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white">
                                کامران محمدی - ۲۳۳۴۵
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">مشخصات کالا:‌ ساعت هوشمند کد کالا: ۸۴۸۴</h5>
                                <p class="card-text">خیلی ساعت عالی و مقبول است ولی رنگش کمی خوب نیست</p>
                            </div>
                        </div>

                        <form action="" method="">

                            <section class="col-12 col-md-9 my-2">
                                <label class="form-label">پاسخ ادمین</label>
                                <textarea name="" rows="5" class="form-control" placeholder="پاسخ ادمین"></textarea>
                            </section>

                            <a href="#" class="btn btn-sm btn-primary mx-3">ثبت</a>
                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
