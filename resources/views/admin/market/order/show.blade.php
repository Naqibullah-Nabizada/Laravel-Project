@extends('admin.layouts.master')

@section('head-tag')
    <title>
        نمایش فکتور</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نمایش فکتور</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <div class="mb-3">
                        <h5>بخش نمایش فکتور</h5>
                    </div>


                    <section>
                        <table class="table table-sm table-striped table-hover" id="printable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                                </tr>

                                <tr class="border-bottom">
                                    <th>{{ $order->id }}</th>
                                    <th class="text-left">
                                        <a href="" class="btn btn-sm btn-dark" id="print"><i
                                                class="fa fa-print mx-1"></i>چاپ</a>

                                        <a href="{{ route('admin.market.order.detail', $order->id) }}" class="btn btn-sm btn-secondary"><i
                                                class="fa fa-book mx-1"></i>جزئیات</a>
                                    </th>
                                </tr>

                                <tr class="border-bottom">
                                    <th>نام سفارش کننده</th>
                                    <th class="text-left">{{ $order->user->full_name }}</th>
                                </tr>

                                <tr>
                                    <th>نام شهر</th>
                                    <th class="text-left">{{ $order->address->city->name }}</th>
                                </tr>

                                <tr>
                                    <th>کد پستی</th>
                                    <th class="text-left">{{ $order->address->postal_cade }}</th>
                                </tr>

                                <tr>
                                    <th>پلاک</th>
                                    <th class="text-left">{{ $order->address->no }}</th>
                                </tr>

                                <tr>
                                    <th>واحد</th>
                                    <th class="text-left">{{ $order->address->unit }}</th>
                                </tr>

                                <tr>
                                    <th>نام گیرنده</th>
                                    <th class="text-left">
                                        {{ $order->address->recipient_first_name . ' ' . $order->address->recipient_last_name }}
                                    </th>
                                </tr>

                                <tr>
                                    <th>موبایل گیرنده</th>
                                    <th class="text-left">{{ $order->address->mobile }}</th>
                                </tr>

                                <tr>
                                    <th>نوع پرداخت</th>
                                    <th class="text-left">
                                        @if ($order->payment_type === 0)
                                            آنلاین
                                        @elseif($order->status === 1)
                                            آفلاین
                                        @else
                                            در محل
                                        @endif
                                    </th>
                                </tr>

                                <tr>
                                    <th>وضعیت پرداخت</th>
                                    <th class="text-left">
                                        @if ($order->payment_status === 0)
                                            پرداخت نشده
                                        @elseif($order->payment_status === 1)
                                            پرداخت شده
                                        @elseif($order->payment_status === 2)
                                            باطل شده
                                        @else
                                            برگشت داده شده
                                        @endif
                                    </th>
                                </tr>

                            </thead>
                        </table>
                        <a href="{{ route('admin.market.order.all') }}" class="btn btn-sm btn-info">بازگشت</a>

                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection


@section('script')

    <script>
        let btnPrint = document.getElementById('print');
        btnPrint.addEventListener('click', function() {
            printContent('printable');
        });


        function printContent(element) {
            let restorePage = $('body').html();
            let PrintContent = $('#' + element).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(restorePage);
        }
    </script>

@endsection
