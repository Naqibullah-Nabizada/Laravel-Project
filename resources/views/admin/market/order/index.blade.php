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
                                    <th>سفارش کننده</th>
                                    <th>کد سفارش</th>
                                    <th>مجموع مبلغ سفارش
                                        {بدون تخفیف}
                                    </th>
                                    <th>مجموع تخفیفات</th>
                                    <th>تخفیف همه محصولات</th>
                                    <th>مبلغ نهایی</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>شیوه پرداخت</th>
                                    <th>بانک</th>
                                    <th>وضعیت ارسال</th>
                                    <th>شیوه ارسال</th>
                                    <th>وضعیت سفارش</th>
                                    <th><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->user->fullName }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_final_amount }} افغانی</td>
                                        <td>{{ $order->order_discount_amount }} افغانی</td>
                                        <td>{{ $order->order_total_products_discount_amount }} افغانی</td>
                                        <td>{{ $order->order_final_amount - $order->order_discount_amount }}</td>
                                        <td>{{ $order->payment_status_value }}</td>
                                        <td>{{ $order->payment_type_value }}</td>
                                        <td>{{ $order->payment->paymentable->gateway ?? '-' }}</td>
                                        <td>{{ $order->delivery_status_value }}</td>
                                        <td>{{ $order->delivery->name }}</td>
                                        <td>{{ $order->order_status_value }}</td>

                                        <td class="text-center">
                                                <a href="{{ route('admin.market.order.show', $order->id) }}" class="btn btn-sm btn-primary">مشاهده فاکتور</a>
                                                <a href="{{ route('admin.market.order.changeSendStatus', $order->id) }}" class="btn btn-sm btn-warning">تغییر وضعیت ارسال</a>
                                                <a href="{{ route('admin.market.order.changeOrderStatus', $order->id) }}" class="btn btn-sm btn-secondary"> وضعیت سفارش</a>
                                                <a href="{{ route('admin.market.order.cancelOrder', $order->id) }}" class="btn btn-sm btn-danger">باطل کردن سفارش</a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
