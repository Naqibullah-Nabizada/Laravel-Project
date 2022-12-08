@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش تیکت</a></li>
            <li class="breadcrumb-item active" aria-current="page"> تیکت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش تیکت ها</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="#" class="btn btn-sm btn-primary disabled">ایجاد تیکت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نویسنده تیکت</th>
                                    <th>عنوان تیکت</th>
                                    <th>توضیحات تیکت</th>
                                    <th>دسته تیکت</th>
                                    <th>اولویت تیکت</th>
                                    <th>ارجاع شده از</th>
                                    <th>تیکت مرجع</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ticket->user->full_name }}</td>
                                        <td>{{ $ticket->subject }}</td>
                                        <td>{{ Str::limit($ticket->description, 50) }}</td>
                                        <td>{{ $ticket->category->name }}</td>
                                        <td>{{ $ticket->category->name }}</td>
                                        <td>{{ $ticket->admin->user->full_name }}</td>
                                        <td>{{ $ticket->parent->subject ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('ticket.change', $ticket->id) }}"
                                                class="btn btn-sm btn-{{ $ticket->status === 0 ? 'warning':'success' }}"><i class="fa fa-check"></i>
                                                {{ $ticket->status === 0 ? 'بستن' : 'باز کردن' }}
                                            </a>

                                            <a href="{{ route('ticket.show', $ticket->id) }}"
                                                class="btn btn-sm btn-info"><i class="fa fa-eye"></i>نمایش</a>
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
