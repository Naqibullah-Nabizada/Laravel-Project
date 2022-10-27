@extends('admin.layouts.master')

@section('head-tag')
    <title>پیج ساز</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> پیج ساز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش پیج ساز</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('page.create') }}" class="btn btn-sm btn-primary">ایجاد پیج جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>آدرس پیج</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>درباره ما</td>
                                    <td>https://toplearn.com</td>
                                    <td class="text-left">
                                        <a href="" class="btn btn-sm btn-warning"><i
                                                class="fa fa-edit mx-1"></i>ویرایش</a>
                                        <a href="" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash-alt mx-1"></i>حذف</a>
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
