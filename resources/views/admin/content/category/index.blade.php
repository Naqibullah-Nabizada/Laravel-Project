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
                                                <button type="submit" class="btn btn-sm btn-danger delete">
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
                            successToast('دسته بندی با موفقیت غیر فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد');
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('مشکلی رخ داده است دوباره تلاش کنید!');
                    }
                }

                error: errorToast('ارتباط برقرار نشد!');
            });


            function successToast(message) {

                let successToastTag = `
                    <section class="toast" data-delay="5000">
                        <section class="toast-header">موفقیت</section>
                            <section class="toast-body d-flex bg-success">
                                <span class="ml-auto">{{ session('toast-success') }}</span>
                                <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </section>
                        </section>
                    <script>

                    $(document).ready(function() {
                        $(".toast").toast('show');
                    })`;

                $(".toast-wrapper").append(successToastTag);
                $(".toast").toast('show').dealy(5000).queue(function() {
                    $(this).remove();
                });
            }



            function errorToast(message) {

                let successToastTag = `
                    <section class="toast" data-delay="5000">
                        <section class="toast-header">موفقیت</section>
                            <section class="toast-body d-flex bg-success">
                                <span class="ml-auto">{{ session('toast-success') }}</span>
                                <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </section>
                        </section>
                    <script>

                    $(document).ready(function() {
                        $(".toast").toast('show');
                    })`;

                $(".toast-wrapper").append(successToastTag);
                $(".toast").toast('show').dealy(5000).queue(function() {
                    $(this).remove();
                });
            }
        }
    </script>

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
