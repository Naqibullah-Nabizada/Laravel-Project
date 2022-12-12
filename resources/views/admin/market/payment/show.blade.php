@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش پرداخت</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">پرداخت</a></li>
            <li class="breadcrumb-item active"> نمایش پرداخت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش پرداخت</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin.market.payment.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>

                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white">
                                مشخصات پرداخت
                            </div>
                            <div class="card-body">
                                <h6 class="card-title"> پرداخت گیرنده:‌ {{ $payment->paymentable->cash_receiver ?? '-'}}</h6>
                                <h6 class="card-title"> پرداخت کننده:‌ {{ $payment->user->full_name }}</h6>
                                <h6 class="card-title"> تاریخ پرداخت:‌ {{ jalaliDate($payment->paymentable->pay_date) }}</h6>
                            </div>
                        </div>

                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
