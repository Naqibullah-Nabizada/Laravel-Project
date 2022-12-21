@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>ایجاد بنر جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">بنر</a></li>
            <li class="breadcrumb-item active"> ایجاد بنر جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش بنر ها</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">عنوان</label>
                                    <input type="text" name="title" class="form-control form-control-sm"
                                        placeholder="عنوان" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">لینک</label>
                                    <input type="text" name="url" class="form-control form-control-sm"
                                        placeholder="لینک" value="{{ old('url') }}">
                                    @error('url')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">موقعیت</label>
                                    <select name="position" class="form-control form-control-sm">
                                        @foreach ($positions as $key => $position)
                                            <option value="{{ $key }}" @if (old('position') == $key) selected @endif>{{ $position }}</option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    @error('image')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status') == 0) selected @endif>
                                            غیر فعال
                                        </option>
                                        <option value="1" @if (old('status') == 1) selected @endif>
                                            فعال
                                        </option>
                                    </select>
                                    @error('status')
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
