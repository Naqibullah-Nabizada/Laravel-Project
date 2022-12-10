@extends('admin.layouts.master')

@section('head-tag')
    <title>رنگ محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> رنگ محصول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش رنگ محصول</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.color.create', $product->id) }}" class="btn btn-sm btn-primary">ایجاد رنگ
                            محصول </a>

                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-secondary">بازگشت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام محصول</th>
                                    <th>تصویر محصول</th>
                                    <th>دسته</th>
                                    <th>رنگ</th>
                                    <th>افزایش قیمت</th>
                                    <th>وضعیت</th>
                                    <th class="col-2 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $color)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img src="{{ asset($color->product->image['indexArray'][$product->image['currentImage']]) }}"
                                                alt="{{ $product->name }}" width="60" height="30"
                                                style="object-fit: cover">
                                        </td>
                                        <td>{{ $color->product->category->name }}</td>
                                        <td>{{ $color->color_name }}</td>
                                        <td>{{ $color->price_increase }}</td>
                                        <td>{{ $color->status === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('product.color.edit', [$color->id, $product->id]) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit mx-1"></i>ویرایش
                                            </a>
                                            <form action="{{ route('product.color.destroy', [$color->id, $product->id]) }}"
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
