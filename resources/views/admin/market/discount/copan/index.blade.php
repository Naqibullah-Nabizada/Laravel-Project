@extends('admin.layouts.master')

@section('head-tag')
    <title>کوپن تخفیف</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش کوپن تخفیف</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin.market.discount.copan.create') }}" class="btn btn-sm btn-primary">ایجاد
                            کوپن تخفیف جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد کوپن</th>
                                    <th>کاربر</th>
                                    <th>درصد تخفیف</th>
                                    <th>نوع تخفیف</th>
                                    <th>سقف تخفیف</th>
                                    <th>نوع کوپن</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($copans as $copan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $copan->code }}</td>
                                        <td>{{ $copan->user->fullName ?? '-'}}</td>
                                        <td>{{ $copan->amount }}</td>
                                        <td>{{ $copan->amount_type === 0 ? 'فیصدی' : 'عددی' }}</td>
                                        <td>{{ $copan->discount_ceiling }}</td>
                                        <td>{{ $copan->type === 0 ? 'عمومی' : 'خصوصی' }}</td>
                                        <td>{{ JalaliDate($copan->start_date) }}</td>
                                        <td>{{ JalaliDate($copan->end_date) }}</td>
                                        <td class="text-left">
                                            <a href="{{ route('admin.market.discount.copan.edit', $copan->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit mx-1"></i>ویرایش</a>
                                                    <form
                                                action="{{ route('admin.market.discount.copan.destroy', $copan->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete">
                                                    <i class="fa fa-trash mx-1"></i>
                                                    حذف
                                                </button>
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
