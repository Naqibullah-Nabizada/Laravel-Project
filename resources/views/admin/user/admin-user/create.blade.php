@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد ادمین جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#">کاربران ادمین</a></li>
            <li class="breadcrumb-item active"> اضافه نمودن امین جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اضافه نمودن ادمین جدید</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin-user.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('admin-user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام</label>
                                    <input type="text" name="first_name"
                                        class="form-control form-control-sm @error('first_name') is-invalid @endError"
                                        placeholder="نام" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام خانوادگی</label>
                                    <input type="text" name="last_name"
                                        class="form-control form-control-sm @error('last_name') is-invalid @endError"
                                        placeholder="نام خانوادگی" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">ایمیل</label>
                                    <input type="text" name="email"
                                        class="form-control form-control-sm @error('email') is-invalid @endError"
                                        placeholder="ایمیل" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">موبایل</label>
                                    <input type="text" name="mobile"
                                        class="form-control form-control-sm @error('mobile') is-invalid @endError"
                                        placeholder="موبایل" value="{{ old('mobile') }}">
                                    @error('mobile')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">رمز عبور</label>
                                    <input type="text" name="password"
                                        class="form-control form-control-sm  @error('password') is-invalid @endError"
                                        placeholder="رمز عبور">
                                    @error('password')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تکرار رمز عبور</label>
                                    <input type="text" name="password_confirmation" class="form-control form-control-sm"
                                        placeholder="تکرار رمز عبور">
                                    @error('password_confirmation')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" name="profile_photo_path"
                                        class="form-control form-control-sm @error('profile_photo_path') is-invalid @endError"
                                        placeholder="تصویر">
                                    @error('profile_photo_path')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت فعال سازی</label>
                                    <select name="activation" class="form-control form-control-sm">
                                        <option value="0" @if (old('activation') == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('activation') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                    @error('activation')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                            </section>

                            <button type="submit" class="btn btn-sm btn-primary">ثبت</button>
                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
