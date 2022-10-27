@extends('admin.layouts.master')

@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش انبار</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="#" class="btn btn-sm btn-primary disabled">ایجاد انبار جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کالا</th>
                                    <th>تصویر کالا</th>
                                    <th>موجودی</th>
                                    <th>انبار</th>
                                    <th>خروجی انبار</th>
                                    <th class="col-3 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>سامسونگ</td>
                                    <td>عکس</td>
                                    <td>12</td>
                                    <td>334</td>
                                    <td>34</td>
                                    <td class="text-center">
                                        <a href="{{ route('store.create') }}" class="btn btn-sm btn-primary"><i
                                                class="fa fa-plus mx-1"></i>افزایش موجودی</a>
                                        <a href="" class="btn btn-sm btn-warning"><i
                                                class="fa fa-edit mx-1"></i>اصلاح موجودی</a>
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
