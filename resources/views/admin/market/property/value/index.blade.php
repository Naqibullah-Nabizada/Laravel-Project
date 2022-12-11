@extends('admin.layouts.master')

@section('head-tag')
    <title>مقدار فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش مقدار فرم کالا</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('property.value.create', $categoryAttribute->id) }}"
                            class="btn btn-sm btn-primary">ایجاد مقدار فرم کالا
                            جدید</a>
                        <a href="{{ route('property.index') }}" class="btn btn-sm btn-secondary">بازگشت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام فرم کالا</th>
                                    <th>نام محصول</th>
                                    <th>مقدار</th>
                                    <th>افزایش قیمت</th>
                                    <th>نوع</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryAttribute->values as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $categoryAttribute->name }}</td>
                                        <td>{{ $value->product->name }}</td>
                                        <td>{{ json_decode($value->value)->value }}</td>
                                        <td>{{ json_decode($value->value)->price_increase }} دالر</td>
                                        <td>{{ $value->type === 0 ? 'ساده' : 'انتخابی' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('property.value.edit', [$categoryAttribute->id, $value->id]) }}"
                                                class="btn btn-sm btn-warning"><i
                                                    class="fa fa-trash-alt mx-1"></i>ویرایش</a>
                                            <form action="{{ route('property.value.destroy', [$categoryAttribute->id, $value->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete">
                                                    <i class="fa fa-trash"></i>
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
