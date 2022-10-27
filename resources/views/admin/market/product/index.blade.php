@extends('admin.layouts.master')

@section('head-tag')
    <title>محصولات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> محصولات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش محصولات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">ایجاد محصول جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام محصول</th>
                                    <th>تصویر محصول</th>
                                    <th>قیمت</th>
                                    <th>وزن</th>
                                    <th>دسته</th>
                                    <th>فرم</th>
                                    <th><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>سامسونگ</td>
                                    <td>عکس</td>
                                    <td>12000 افغانی</td>
                                    <td>13 کیلو گرام</td>
                                    <td>کالای الکترونیکی</td>
                                    <td>نمایشگر</td>
                                    <td>
                                        <div class="dropdown">

                                            <a href="#" class="btn btn-sm btn-success dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="fa fa-tools mx-1"></i>عملیات
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item text-right"><i
                                                        class="fa fa-images"></i>مشاهده فاکتور</a>
                                                <a href="#" class="dropdown-item text-right"><i
                                                        class="fa fa-list-ul"></i>تغییر وضعیت ارسال</a>
                                                <a href="#" class="dropdown-item text-right"><i
                                                        class="fa fa-edit"></i>تغییر وضعیت سفارش</a>
                                                <a href="#" class="dropdown-item text-right"><i
                                                        class="fa fa-window-close"></i>باطل کردن سفارش</a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
