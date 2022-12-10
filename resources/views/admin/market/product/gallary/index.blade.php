@extends('admin.layouts.master')

@section('head-tag')
    <title>گالری محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> گالری محصول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش گالری محصول</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.gallary.create', $product->id) }}" class="btn btn-sm btn-primary">ایجاد گالری محصول</a>

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
                                    <th>دسته</th>
                                    <th>گالری</th>
                                    <th class="col-1 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallary as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $item->product->category->name }}</td>
                                        <td>
                                            <img src="{{ asset($item->image['indexArray'][$item->image['currentImage']]) }}"
                                                alt="{{ $product->name }}" width="60" height="30"
                                                style="object-fit: cover">
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('product.gallary.destroy', [$item->id, $product->id]) }}"
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
