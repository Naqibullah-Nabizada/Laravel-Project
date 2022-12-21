@extends('admin.layouts.master')

@section('head-tag')
    <title>بنر ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> بنر ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش بنر ها</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('banner.create') }}" class="btn btn-sm btn-primary">ایجاد بنر جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>تصویر</th>
                                    <th>موقعیت</th>
                                    <th>لینک</th>
                                    <th>وضعیت</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>

                                  @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>
                                            <img src="{{ asset($banner->image) }}"
                                                alt="{{ $banner->name }}" width="60" height="30"
                                                style="object-fit: cover">
                                        </td>
                                        <td>{{ $position[$banner->position] }}</td>
                                        <td>{{ $banner->url }}</td>
                                        <td>{{ $banner->status == 0 ? 'غیر فعال' : 'فعال' }}</td>
                                        <td class="text-left">
                                            <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-edit mx-1"></i>ویرایش</a>

                                            <form action="{{ route('banner.destroy', $banner->id) }}" method="POST"
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
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
