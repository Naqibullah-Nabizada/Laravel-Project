@extends('admin.layouts.master')

@section('head-tag')
    <title>فایل اطلاعیه ایمیلی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش اطاع رسانی</a></li>
            <li class="breadcrumb-item"> <a href="">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active" aria-current="page"> فایل های اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش فایل اطلاعیه ایمیلی</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('email-file.create', $email->id) }}" class="btn btn-sm btn-primary">ایجاد فایل
                            اطلاعیه ایمیلی</a>
                        <a href="{{ route('email.index') }}" class="btn btn-sm btn-secondary">بازگشت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان ایمیل</th>
                                    <th>سایز فایل</th>
                                    <th>نوع فایل</th>
                                    <th>وضعیت</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($email->files as $file)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $email->subject }}</td>
                                        <td>{{ $file->file_size }}</td>
                                        <td>{{ $file->file_type }}</td>
                                        <td>{{ $file->status == 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">

                                            <a href="{{ route('email-file.edit', $file->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i>ویرایش</a>

                                            <form action="{{ route('email-file.destroy', $file->id) }}" method="POST"
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
