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
                                    <th>نام صفحه</th>
                                    <th>محتوا</th>
                                    <th>سلاگ</th>
                                    <th>برچسب ها</th>
                                    <th>وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $key => $page)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->body }}</td>
                                        <td>{{ $page->slug }}</td>
                                        <td>{{ $page->tags }}</td>
                                        <td>{{ $page->status == 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-left">
                                            <a href="{{ route('page.edit', $page->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form action="{{ route('page.destroy', $page->id) }}"
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
