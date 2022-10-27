@extends('admin.layouts.master')

@section('head-tag')
    <title>پرداخت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> پرداخت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش پرداخت ها</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="#" class="btn btn-sm btn-primary">ایجاد پرداخت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد تراکنش</th>
                                    <th>بانک</th>
                                    <th>پرداخت کننده</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>نوع پرداخت</th>
                                    <th class="col-4 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>034343</td>
                                    <td>ملت</td>
                                    <td>کامران محمدی</td>
                                    <td>تایید شده</td>
                                    <td>آنلاین</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-sm btn-info"><i
                                                class="fa fa-eye mx-1"></i>نمایش</a>
                                        <a href="" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash-alt mx-1"></i>باطل کردن</a>
                                        <a href="" class="btn btn-sm btn-warning"><i
                                                class="fa fa-reply mx-1"></i>برگرداندن</a>
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
