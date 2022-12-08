@extends('admin.layouts.master')

@section('head-tag')
    <title>دسترسی نقش</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#">مشتریان</a></li>
            <li class="breadcrumb-item active"> دسترسی نقش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>دسترسی نقش</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('role.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>

                    <section>
                        <form action="{{ route('user.role.permission-update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row mt-4">

                                <section class="col-12">
                                    <div class="row p-3">
                                        <span> <strong>نام نقش:</strong> {{ $role->name }}</span>
                                        <span class="mx-5"> <strong>توضیحات نقش:</strong> {{ $role->description }}</span>
                                    </div>
                                    <div class="row border-top p-2">
                                        @php
                                            $rolePermissionsArray = $role->permissions->pluck('id')->toArray();
                                        @endphp

                                        @foreach ($permissions as $key => $permission)
                                            <div class="col-md-3">
                                                <input type="checkbox" name="permissions[]" id="{{ $permission->id }}"
                                                    class="form-check-input" value="{{ $permission->id }}"
                                                    @if (in_array($permission->id, $rolePermissionsArray)) checked @endif>
                                                <label for="{{ $permission->id }}" class="form-check-label mr-4 mx-1">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    @error('permissions.' . $key)
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </section>

                            </section>

                            <div class="col-12 col-md-2 my-5">
                                <button type="submit" class="btn btn-sm btn-warning">ویرایش</button>
                            </div>
                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
