@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش دسته بندی</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">ایجاد دسته بندی</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام دسته بندی</th>
                                    <th>توضیحات</th>
                                    <th>دسته والد</th>
                                    <th>تگ ها</th>
                                    <th>تصویر</th>
                                    <th>نمایش در منو</th>
                                    <th>وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productCategories as $productCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $productCategory->name }}</td>
                                        <td>{{ Str::limit($productCategory->description, 25) }}</td>
                                        <td>
                                            {{ $productCategory->parent_id == null ? 'منوی اصلی' : $productCategory->parent->name }}
                                        </td>
                                        <td>{{ $productCategory->tags }}</td>
                                        <td>
                                            {{-- <img src="{{ asset($productCategory->image['indexArray'][$productCategory->image['currentImage']]) }}"
                                                alt="{{ $productCategory->name }}" width="60" height="30"
                                                style="object-fit: cover"> --}}
                                        </td>
                                        <td>{{ $productCategory->show_in_menu === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td>{{ $productCategory->status === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('category.edit', $productCategory->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form action="{{ route('category.destroy', $productCategory->id) }}"
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
