@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش تنظیمات</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item active"> ویرایش تنظیمات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش تنظیمات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('setting.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('setting.update', $setting->id) }}" method="POST"
                            enctype="multipart/form-data" id="form">
                            @csrf
                            @method('PUT')
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">عنوان سایت</label>
                                    <input type="text" name="title"
                                        class="form-control form-control-sm @error('title') is-invalid @enderror"
                                        placeholder="عنوان سایت" value="{{ old('title', $setting->title) }}">
                                    @error('title')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">کلمات کلیدی</label>
                                    <input type="text" name="keywords"
                                        class="form-control form-control-sm @error('keywords') is-invalid @enderror"
                                        placeholder="کلمات کلیدی" value="{{ old('keywords', $setting->keywords) }}">
                                    @error('keywords')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea name="description" rows="7"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="توضیحات">{{ old('description', $setting->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">لوگوی سایت</label>
                                    <input type="file" name="logo"
                                        class="form-control form-control-sm @error('logo') is-invalid @enderror">
                                    @error('logo')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">آیکن سایت</label>
                                    <input type="file" name="icon"
                                        class="form-control form-control-sm @error('icon') is-invalid @enderror">
                                    @error('icon')
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

