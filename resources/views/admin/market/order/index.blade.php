@extends('admin.layouts.master')

@section('head-tag')
    <title>سفارشات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> سفارشات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش سفارشات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="#" class="btn btn-sm btn-primary disabled">ایجاد سفارش</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد سفارش</th>
                                    <th>مبلغ سفارش</th>
                                    <th>مبلغ تخفیف</th>
                                    <th>مبلغ نهایی</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>شیوه پرداخت</th>
                                    <th>بانک</th>
                                    <th>وضعیت ارسال</th>
                                    <th>شیوه ارسال</th>
                                    <th>وضعیت سفارش</th>
                                    <th><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>94334</td>
                                    <td>2999 افغانی</td>
                                    <td>300</td>
                                    <td>2699</td>
                                    <td>پرداخت شده</td>
                                    <td>آفلاین</td>
                                    <td>ملت</td>
                                    <td>ارسال شده</td>
                                    <td>پیک موتوری</td>
                                    <td>ارسال شده</td>
                                    <td>
                                        <div class="dropdown">

                                            <a href="#" class="btn btn-sm btn-success dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="fa fa-tools mx-1"></i>عملیات
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item text-right"><i class="fa fa-images"></i>مشاهده فاکتور</a>
                                                <a href="#" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>تغییر وضعیت ارسال</a>
                                                <a href="#" class="dropdown-item text-right"><i class="fa fa-edit"></i>تغییر وضعیت سفارش</a>
                                                <a href="#" class="dropdown-item text-right"><i class="fa fa-window-close"></i>باطل کردن سفارش</a>
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
