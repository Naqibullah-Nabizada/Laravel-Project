@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد مقدار فرم کالا</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item active"> ایجاد مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ایجاد مقدار فرم کالا</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('property.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('property.value.store', $categoryAttribute->id) }}" method="POST">
                            @csrf
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">انتخاب محصول</label>
                                    <select name="product_id" class="form-control form-control-sm">
                                        <option>محصول را انتخاب کنید</option>
                                        @foreach ($categoryAttribute->category->products as $product)
                                            <option value="{{ $product->id }}"
                                                @if (old('product_id') == $product->id) selected @endif>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">مقدار</label>
                                    <input type="text" name="value" class="form-control form-control-sm"
                                        placeholder="مقدار" value="{{ old('value') }}">
                                    @error('value')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">افزایش قیمت</label>
                                    <input type="text" name="price_increase" class="form-control form-control-sm"
                                        placeholder="افزایش قیمت" value="{{ old('price_increase') }}">
                                    @error('price_increase')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نوع</label>
                                    <select name="type"
                                        class="form-control form-control-sm @error('type') is-invalid @enderror">
                                        <option value="0" @if (old('type') == 0) selected @endif>ساده
                                        </option>
                                        <option value="1" @if (old('type') == 1) selected @endif>انتخابی
                                        </option>
                                    </select>
                                    @error('type')
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
