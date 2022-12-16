@extends('admin.layouts.master')

@section('head-tag')
    <title>جزئیات سفارش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> جزئیات سفارش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش جزئیات سفارش</h5>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام محصول</th>
                                    <th>درصد فروش فوق العاده</th>
                                    <th>مبلغ فروش فوق العاده</th>
                                    <th>تعداد</th>
                                    <th>مجموع قیمت محصول</th>
                                    <th>مبلغ نهایی</th>
                                    <th>رنگ</th>
                                    <th>گارانتی</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->singleProduct->name }}</td>
                                    <td>{{ $item->amazingSale->percentage ?? '0'}}</td>
                                    <td>{{ $item->amazing_sale_discount_amount ?? '0' }} افغانی</td>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->final_product_price }} افغانی</td>
                                    <td>{{ $item->final_total_price }}</td>
                                    <td>{{ $item->color->color_name }}</td>
                                    <td>{{ $item->guarantee->name }}</td>

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
