@extends('admin.layouts.master')

@section('head-tag')
    <title>مشتریان</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page"> مشتریان</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش  مشتریان</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary">ایجاد مشتری جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ایمیل</th>
                                    <th>شماره موبایل</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>کد ملی</th>
                                    <th class="col-3 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ahmad@gmail.com</td>
                                    <td>074938344</td>
                                    <td>احمد</td>
                                    <td>کریمی</td>
                                    <td>4399435</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-sm btn-info"><i class="fa fa-edit mx-1"></i>نقش</a>
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
