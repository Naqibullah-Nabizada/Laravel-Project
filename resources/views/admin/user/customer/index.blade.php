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

                    <h5>بخش مشتریان</h5>

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
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>موبایل</th>
                                    <th>ایمیل</th>
                                    <th>تصویر</th>
                                    <th>وضعیت</th>
                                    <th>فعال سازی</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <img src="{{ asset($user->profile_photo_path) }}" alt="avatar" width="50">
                                        </td>
                                        <td>{{ $user->status === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td>{{ $user->activation === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.edit', $user->id) }}"
                                                class="btn btn-sm btn-warning"><i
                                                    class="fa fa-trash-alt mx-1"></i>ویرایش</a>
                                            <form action="{{ route('customer.destroy', $user->id) }}" method="POST"
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
