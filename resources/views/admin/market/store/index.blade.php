@extends('admin.layouts.master')

@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش انبار</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a class="btn btn-sm btn-primary disabled">ایجاد انبار جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کالا</th>
                                    <th>برند کالا</th>
                                    <th>دسته کالا</th>
                                    <th>تصویر کالا</th>
                                    <th>کالای قابل فروش</th>
                                    <th>کالای ریزرف شده</th>
                                    <th>کالای فروختده شده</th>
                                    <th class="col-3 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand->original_name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                                alt="{{ $product->name }}" width="60" height="30"
                                                style="object-fit: cover">
                                        </td>
                                        <td>{{ $product->marketable_number }}</td>
                                        <td>{{ $product->frozen_number }}</td>
                                        <td>{{ $product->sold_number }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('product.store.add-to-store', $product->id) }}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-plus mx-1"></i>افزایش موجودی</a>
                                            <a href="{{ route('product.store.edit', $product->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit mx-1"></i>اصلاح موجودی</a>
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
