@extends('admin.layouts.master')

@section('head-tag')
    <title>کاربران ادمین</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page"> کاربران ادمین</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش کاربران ادمین</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin-user.create') }}" class="btn btn-sm btn-primary">ایجاد ادمین جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>شماره موبایل</th>
                                    <th>ایمیل</th>
                                    <th>تصویر</th>
                                    <td>وضعیت</td>
                                    <td>فعال سازی</td>
                                    <th>نقش</th>
                                    <th class="col-3 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $key => $admin)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $admin->first_name }}</td>
                                        <td>{{ $admin->last_name }}</td>
                                        <td>{{ $admin->mobile }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <img src="{{ asset($admin->profile_photo_path) }}" alt="avator"
                                                width="50">
                                        </td>
                                        <td>{{ $admin->status === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td>{{ $admin->activation === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td>سوپر ادمین</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-sm btn-info"><i
                                                    class="fa fa-edit mx-1"></i>نقش</a>
                                            <a href="{{ route('admin-user.edit', $admin->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-trash-alt mx-1"></i>ویرایش</a>
                                            <form action="{{ route('admin-user.destroy', $admin->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete">
                                                    <i class="fa fa-trash mx-1"></i>حذف</button>
                                            </form>
                                        </td>
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

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
