@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نقش ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش نقش ها</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('role.create') }}" class="btn btn-sm btn-primary">ایجاد نقش جدید</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام نقش</th>
                                    <th class="col-2">توضیحات نقش</th>
                                    <th>دسترسی ها</th>
                                    <th class="col-3 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ Str::limit($role->description, 30) }}</td>
                                        <td>
                                            @if (empty(
                                                $role->permissions()->get()->toArray()
                                            ))
                                                <span class="text-danger">برای این نقش سطح دسترسی تعریف نشده است</span>
                                            @else
                                                @foreach ($role->permissions as $permission)
                                                    {{ $permission->name . ' & ' }}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('user.role.permission-form', $role->id) }}"
                                                class="btn btn-sm btn-primary"><i
                                                    class="fa fa-user-graduate mx-1"></i>دسترسی ها</a>
                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-trash-alt mx-1"></i>ویرایش</a>
                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST"
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
