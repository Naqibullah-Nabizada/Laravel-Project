@extends('admin.layouts.master')

@section('head-tag')
    <title>اولویت بندی تیکت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page"> اولویت بندی تیکت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اولویت بندی تیکت ها</h5>

                    @include('admin.alerts.alert-section.success')

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('priority.create') }}" class="btn btn-sm btn-primary">ایجاد اولویت بندی تیکت</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-2">نام اولویت بندی</th>
                                    <th class="col-2">وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($priorities as $key => $priority)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $priority->name }}</td>
                                        <td>{{ $priority->status === 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('priority.edit', $priority->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                            <form action="{{ route('priority.destroy', $priority->id) }}" method="POST"
                                                class="d-inline">
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
                            successToast('اولویت بندی با موفقیت غیر فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('اولویت بندی با موفقیت غیر فعال شد');
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
