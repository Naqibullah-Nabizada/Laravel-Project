@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش تیکت</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item"> <a href="#">تیکت</a></li>
            <li class="breadcrumb-item active"> نمایش تیکت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش تیکت ها</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('ticket.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>

                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white">
                                کامران محمدی - ۲۳۳۴۵
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">موضوع:‌ عدم دسترسی به صفحه اصلی سایت</h5>
                                <p class="card-text">خیلی ساعت عالی و مقبول است ولی رنگش کمی خوب نیست</p>
                            </div>
                        </div>

                        <form action="" method="">

                            <section class="col-12 col-md-9 my-2">
                                <label class="form-label">پاسخ تیکت</label>
                                <textarea name="" rows="5" class="form-control" placeholder="پاسخ تیکت"></textarea>
                            </section>

                            <a href="#" class="btn btn-sm btn-primary mx-3">ثبت</a>
                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
