@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش تنظیمات</a></li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش تنظیمات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a class="btn btn-sm btn-primary disabled">ایجاد تنظیمات جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام سایت</th>
                                    <th>توضیحات</th>
                                    <th>کلمات کلیدی</th>
                                    <th>آیکون</th>
                                    <th>لوگو</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ 1 }}</td>
                                    <td>{{ $setting->title }}</td>
                                    <td>{{ $setting->description }}</td>
                                    <td>{{ $setting->keywords }}</td>
                                    <td>
                                        <img src="{{ asset($setting->icon) }}" alt="icon" width="50">
                                    </td>

                                    <td>
                                        <img src="{{ asset($setting->logo) }}" alt="logo" width="50">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('setting.edit', $setting->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i>ویرایش</a>
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
