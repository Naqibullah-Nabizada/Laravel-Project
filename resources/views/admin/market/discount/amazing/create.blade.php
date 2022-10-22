@extends('admin.layouts.master')

@section('head-tag')
    <title>افزودن کالا به فروش شگفت انگیز</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">فروش شگفت انگیز</a></li>
            <li class="breadcrumb-item active"> افزودن کالا به فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش افزودن کالا به فروش شگفت انگیز</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin.market.discount.amazingSale') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام کالا</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام کالا">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">درصد تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="درصد تخفیف">
                                </div>


                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ شروع</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="تاریخ شروع">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ پایان</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="تاریخ پایان">
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
