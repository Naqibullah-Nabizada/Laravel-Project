@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش دسته بندی</h5>

                    @include('admin.alerts.alert-section.success')

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('content.category.create') }}" class="btn btn-sm btn-primary">ایجاد دسته بندی</a>
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
                                    <th>اسلاگ</th>
                                    <th>تصویر</th>
                                    <th>وضعیت</th>
                                    <th>برچسپ ها</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($postCategories as $postCategory)
                                    <tr>
                                        <td>{{ $postCategory->id }}</td>
                                        <td>{{ $postCategory->name }}</td>
                                        <td>{{ $postCategory->description }}</td>
                                        <td>{{ $postCategory->slug }}</td>
                                        <td>{{ $postCategory->image }}</td>
                                        <td>
                                            <input type="checkbox" class="form-check-inline" id="{{ $postCategory->id }}"
                                                onchange="changeStatus({{ $postCategory->id }})"
                                                data-url="{{ route('content.category.status', $postCategory->id) }}"
                                                @if ($postCategory->status === 1) checked @endif>
                                        </td>
                                        <td>{{ $postCategory->tags }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('content.category.edit', $postCategory->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form action="{{ route('content.category.destroy', $postCategory->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
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
    <script>
        const changeStatus = (id) => {

            let element = $("#" + id);
            let url = element.attr('data-url');
            let elementValue = !element.prop('checked');

            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {

                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                        } else {
                            element.prop('checked', false);
                        }
                    } else {
                        element.prop('checked', elementValue);
                    }
                }
            });
        }
    </script>
@endsection
