@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد فرم کالا</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item active"> ایجاد فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش فرم کالا</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('property.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام فرم</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام دسته">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">فرم والد</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="">فرم را انتخاب کنید</option>
                                        <option value="">کالای الکترونیکی</option>
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
