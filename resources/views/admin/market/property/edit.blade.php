@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش فرم کالا</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item active"> ویرایش فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ویرایش فرم کالا</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('property.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('property.update', $category_attribute->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام فرم</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        placeholder="نام فرم" value="{{ old('name', $category_attribute->name) }}">
                                    @error('name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">دسته کالا</label>
                                    <select name="category_id" class="form-control form-control-sm">
                                        <option>دسته کالا را انتخاب کنید</option>
                                        @foreach ($product_categories as $product_category)
                                            <option value="{{ $product_category->id }}"
                                                @if (old('category_id', $category_attribute->category_id) == $product_category->id) selected @endif>
                                                {{ $product_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">واحد اندازه گیری</label>
                                    <input type="text" name="unit" class="form-control form-control-sm"
                                        placeholder="واحد اندازه گیری" value="{{ old('unit', $category_attribute->unit) }}">
                                    @error('unit')
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
