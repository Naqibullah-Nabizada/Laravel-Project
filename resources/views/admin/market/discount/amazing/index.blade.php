@extends('admin.layouts.master')

@section('head-tag')
    <title>فروش شگفت انگیز</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش فروش شگفت انگیز</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin.market.discount.amazingSale.create') }}"
                            class="btn btn-sm btn-primary">افزودن کالا به فروش شگفت انگیز</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کالا</th>
                                    <th>درصد تخفیف</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($amazingSales as $amazingSale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $amazingSale->product->name }}</td>
                                        <td>{{ $amazingSale->percentage }}</td>
                                        <td>{{ JalaliDate($amazingSale->start_date) }}</td>
                                        <td>{{ JalaliDate($amazingSale->end_date) }}</td>
                                        <td>{{ $amazingSale->status === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.market.discount.amazingSale.edit', $amazingSale->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form
                                                action="{{ route('admin.market.discount.amazingSale.destroy', $amazingSale->id) }}"
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
