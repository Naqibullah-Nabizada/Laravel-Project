@extends('admin.layouts.master')

@section('head-tag')
    <title>اطلاعیه پیامکی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش اطاع رسانی</a></li>
            <li class="breadcrumb-item active" aria-current="page"> اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اطلاعیه پیامکی</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('sms.create') }}" class="btn btn-sm btn-primary">ایجاد اطلاعیه پیامکی</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان پیام</th>
                                    <th>متن پیام</th>
                                    <th>تاریخ ارسال</th>
                                    <th>وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sms as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ Str::limit($item->body, 35) }}</td>
                                        <td>{{ $item->published_at }}</td>
                                        <td>{{ $item->status == 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-left">
                                            <a href="{{ route('sms.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form action="{{ route('sms.destroy', $item->id) }}" method="POST"
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
