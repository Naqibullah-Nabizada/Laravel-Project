@extends('admin.layouts.master')

@section('head-tag')
    <title>نظرات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش نظرات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="#" class="btn btn-sm btn-primary disabled">ایجاد نظر</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد کاربر</th>
                                    <th>نوسینده نظر</th>
                                    <th>کد کالا</th>
                                    <th>کالا</th>
                                    <th>وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>293883</td>
                                    <td>حسن احمدی</td>
                                    <td>3990</td>
                                    <td>آیفون ۱۲</td>
                                    <td>در انتظار تایید</td>
                                    <td class="text-left">
                                        <a href="{{ route('content.comment.show', 1) }}" class="btn btn-sm btn-info"><i
                                                class="fa fa-eye mx-1"></i>نمایش</a>
                                        <a href="" class="btn btn-sm btn-success"><i
                                                class="fa fa-check mx-1"></i>تایید</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>293883</td>
                                    <td>حسن احمدی</td>
                                    <td>3990</td>
                                    <td>آیفون ۱۲</td>
                                    <td>تایید</td>
                                    <td class="text-left">
                                        <a href="{{ route('content.comment.show', 1) }}" class="btn btn-sm btn-info"><i
                                                class="fa fa-eye mx-1"></i>نمایش</a>
                                        <a href="" class="btn btn-sm btn-warning"><i
                                                class="fa fa-clock"></i>عدم تایید</a>
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
