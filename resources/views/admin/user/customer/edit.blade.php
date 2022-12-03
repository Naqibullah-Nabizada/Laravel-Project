@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش مشتری جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#">مشتریان</a></li>
            <li class="breadcrumb-item active"> ویرایش مشتری جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ویرایش مشتری جدید</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('customer.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('customer.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام</label>
                                    <input type="text" name="first_name"
                                        class="form-control form-control-sm @error('first_name') is-invalid @enderror"
                                        placeholder="نام" value="{{ old('first_name', $user->first_name) }}">
                                    @error('first_name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام خانوادگی</label>
                                    <input type="text" name="last_name"
                                        class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                                        placeholder="نام خانوادگی" value="{{ old('last_name', $user->last_name) }}">
                                    @error('last_name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="text" name="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        placeholder="ایمیل" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">موبایل</label>
                                    <input type="text" name="mobile"
                                        class="form-control form-control-sm @error('mobile') is-invalid @enderror"
                                        placeholder="موبایل" value="{{ old('mobile', $user->mobile) }}">
                                    @error('mobile')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" name="profile_photo_path"
                                        class="form-control form-control-sm @error('profile_photo_path') is-invalid @enderror"
                                        placeholder="تصویر">
                                    @error('profile_photo_path')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت کاربر</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status', $user->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $user->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </section>

                            <button type="submit" class="btn btn-sm btn-warning">ویرایش</button>
                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
