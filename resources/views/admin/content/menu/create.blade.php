@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد منوی جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">منو</a></li>
            <li class="breadcrumb-item active"> ایجاد منوی جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش منوی سایت</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('menu.store') }}" method="POST">
                            @csrf
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام منو</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        placeholder="نام منو" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">منوی والد</label>
                                    <select name="parent_id" class="form-control form-control-sm">
                                        <option value="{{ null }}">منوی اصلی</option>
                                        @foreach ($menus as $menu)
                                            <option value="{{ $menu->id }}"
                                                @if (old('parent_id') == $menu->id) selected @endif>{{ $menu->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">لینک منو</label>
                                    <input type="text" name="url" class="form-control form-control-sm"
                                        placeholder="لینک منو" value="{{ old('url') }}">
                                    @error('url')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status') == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال
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
