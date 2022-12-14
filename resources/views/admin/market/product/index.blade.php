@extends('admin.layouts.master')

@section('head-tag')
    <title>محصولات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> محصولات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش محصولات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">ایجاد محصول جدید</a>
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
                                    <th>برند</th>
                                    <th>قیمت</th>
                                    <th>وزن</th>
                                    <th class="col-4 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                                alt="{{ $product->name }}" width="60" height="30"
                                                style="object-fit: cover">
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->brand->original_name ?? '-' }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->weight }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('product.gallary.index', $product->id) }}" class="btn btn-sm btn-primary">گالری</a>
                                            <a href="{{ route('product.color.index', $product->id) }}"
                                                class="btn btn-sm btn-secondary">رنگ کالا</a>
                                                <a href="{{ route('product.guarantee.index', $product->id) }}"
                                                    class="btn btn-sm btn-success">گارانتی</a>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-sm btn-warning">ویرایش</a>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete">
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
