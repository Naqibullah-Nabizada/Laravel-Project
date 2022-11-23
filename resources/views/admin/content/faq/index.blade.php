@extends('admin.layouts.master')

@section('head-tag')
    <title>سوالات متداول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> سوالات متداول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش سوالات متداول</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary">ایجاد پرسش جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>پرسش</th>
                                    <th>خلاصه پاسخ</th>
                                    <th>برچسب ها</th>
                                    <th>وضعیت</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $faq)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->answer }}</td>
                                        <td>{{ $faq->tags }}</td>
                                        <td>{{ $faq->status == 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST"
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
