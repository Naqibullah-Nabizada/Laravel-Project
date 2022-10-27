@extends('admin.layouts.master')

@section('head-tag')
    <title>سوالات متداول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> سوالات متداول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش سوالات متداول</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary">ایجاد پرسش جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>پرسش</th>
                                    <th>خلاصه پاسخ</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>چگونه تمام ویدیو را دانلود کنیم؟</td>
                                    <td>بالای لینک به رنگ آبی کلیک کنید</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash-alt mx-1"></i>ویرایش</a>
                                        <a href="" class="btn btn-sm btn-warning"><i
                                                class="fa fa-trash mx-1"></i>حذف</a>
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
