@extends('admin.layouts.master')

@section('head-tag')
    <title>روش های ارسال</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> روش های ارسال</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش روش های ارسال</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('delivery.create') }}" class="btn btn-sm btn-primary">ایجاد روش ارسال جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام روش ارسال</th>
                                    <th>هزینه ارسال</th>
                                    <th>زمان ارسال</th>
                                    <th>واحد زمان ارسال</th>
                                    <th>وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delivery_methods as $delivery_method)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $delivery_method->name }}</td>
                                        <td>{{ $delivery_method->amount . ' افغانی' }}</td>
                                        <td>{{ $delivery_method->delivery_time }}</td>
                                        <td>{{ $delivery_method->delivery_time_unit }}</td>
                                        <td>{{ $delivery_method->status === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('delivery.edit', $delivery_method->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form action="{{ route('delivery.destroy', $delivery_method->id) }}"
                                                method="POST" class="d-inline">
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
