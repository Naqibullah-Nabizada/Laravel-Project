@extends('admin.layouts.master')

@section('head-tag')
    <title>فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page"> فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش فرم کالا</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('property.create') }}" class="btn btn-sm btn-primary">ایجاد فرم جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان فرم</th>
                                    <th>دسته کالا</th>
                                    <th>واحد اندازه گیری</th>
                                    <th class="col-4 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category_attributes as $category_attribute)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category_attribute->name }}</td>
                                        <td>{{ $category_attribute->category->name }}</td>
                                        <td>{{ $category_attribute->unit }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('property.value.index', $category_attribute->id) }}" class="btn btn-sm btn-info"><i
                                                    class="fa fa-edit mx-1"></i>ویژگی ها</a>
                                            <a href="{{ route('property.edit', $category_attribute->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-trash-alt mx-1"></i>ویرایش</a>
                                            <form action="{{ route('property.destroy', $category_attribute->id) }}" method="POST"
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
