@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد روش ارسال</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">روش ارسال</a></li>
            <li class="breadcrumb-item active"> ایجاد روش ارسال جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش روش ارسال جدید</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('delivery.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام روش ارسال</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام روش ارسال">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">هزینه ارسال</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="هزینه ارسال">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">زمان ارسال</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="زمان ارسال">
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
