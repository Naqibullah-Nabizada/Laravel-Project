@extends('admin.layouts.master')

@section('head-tag')
    <title>ادمین تیکت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش تیکت</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ادمین تیکت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش امین تیکت</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a class="btn btn-sm btn-primary disabled">ایجاد ادمین تیکت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $key => $admin)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $admin->fullName }}</td>
                                        <td>{{ $admin->email }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('ticket.admin.set', 1) }}"
                                                class="btn btn-sm btn-{{ $admin->ticketAdmin === null ? 'success' : 'danger' }}"><i
                                                    class="fa fa-check mx-1"></i>
                                                {{ $admin->ticketAdmin === null ? 'اضافه' : 'حذف' }}
                                            </a>
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
