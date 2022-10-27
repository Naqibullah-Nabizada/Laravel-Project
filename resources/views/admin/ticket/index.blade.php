@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش تیکت</a></li>
            <li class="breadcrumb-item active" aria-current="page"> تیکت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش نظرات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="#" class="btn btn-sm btn-primary disabled">ایجاد تیکت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نویسنده تیکت</th>
                                    <th>عنوان تیکت</th>
                                    <th>دسته تیکت</th>
                                    <th>اولویت تیکت</th>
                                    <th>ارجاع شده از</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>حامد احمدی</td>
                                    <td>پرداخت انجام نشده</td>
                                    <td>دسته فروش</td>
                                    <td>فوری</td>
                                    <td>علی مرادی</td>
                                    <td class="text-center">
                                        <a href="{{ route('ticket.show', 1) }}" class="btn btn-sm btn-info"><i
                                                class="fa fa-eye mx-1"></i>نمایش</a>
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
