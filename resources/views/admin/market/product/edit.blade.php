@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>ویرایش محصول</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">محصولات</a></li>
            <li class="breadcrumb-item active"> ویرایش محصول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ویرایش محصول</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data" id="form">
                            @csrf
                            @method('PUT')
                            <section class="row border-bottom">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام محصول</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        placeholder="نام محصول" value="{{ old('name', $product->name) }}">
                                    @error('name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">برچسپ ها</label>
                                    <input type="hidden" name="tags" class="form-control form-control-sm"
                                        placeholder="برچسپ ها" value="{{ old('tags', $product->tags) }}" id="tags">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                    @error('tags')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">دسته محصول</label>
                                    <select name="category_id" class="form-control form-control-sm">
                                        <option>دسته را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"
                                                @if (old('category_id', $product->category_id) == $productCategory->id) selected @endif>
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">برند محصول</label>
                                    <select name="brand_id" class="form-control form-control-sm">
                                        <option>برند را انتخاب کنید</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                @if (old('brand_id', $product->brand_id) == $brand->id) selected @endif>
                                                {{ $brand->original_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="published_at_view" class="form-control form-control-sm"
                                        placeholder="تاریخ انتشار">
                                    @error('published_at')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    @error('image')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror

                                    <section class="row my-2">
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($product->image['indexArray'] as $key => $value)
                                            <section class="col-md-{{ 6 / $number }}">
                                                <div class="form-check">
                                                    <input type="radio" name="currentImage" id="{{ $number }}"
                                                        class="form-check-input" value="{{ $key }}"
                                                        @if ($product->image['currentImage'] == $key) checked @endIf>
                                                    <label for="{{ $number }}">
                                                        <img src="{{ asset($value) }}" alt="img" class="w-75">
                                                    </label>
                                                </div>
                                            </section>
                                            @php
                                                $number++;
                                            @endphp
                                        @endforeach
                                    </section>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وزن</label>
                                    <input type="text" name="weight" class="form-control form-control-sm"
                                        placeholder="وزن" value="{{ old('weight', $product->weight) }}">
                                    @error('weight')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">ارتفاع</label>
                                    <input type="text" name="height" class="form-control form-control-sm"
                                        placeholder="ارتفاع" value="{{ old('height', $product->height) }}">
                                    @error('height')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">طول</label>
                                    <input type="text" name="length" class="form-control form-control-sm"
                                        placeholder="طول" value="{{ old('length', $product->length) }}">
                                    @error('length')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">عرض</label>
                                    <input type="text" name="width" class="form-control form-control-sm"
                                        placeholder="عرض" value="{{ old('width', $product->width) }}">
                                    @error('width')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">قیمت کالا</label>
                                    <input type="text" name="price" class="form-control form-control-sm"
                                        placeholder="قیمت کالا" value="{{ old('price', $product->price) }}">
                                    @error('price')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status', $product->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $product->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">قابل فروش بودن</label>
                                    <select name="marketable"
                                        class="form-control form-control-sm @error('marketable') is-invalid @enderror">
                                        <option value="0" @if (old('marketable', $product->marketable) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('marketable', $product->marketable) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                    @error('marketable')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea name="introduction" id="introduction" rows="5" class="form-control">{{ old('introduction', $product->introduction) }}</textarea>
                                    @error('introduction')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                @foreach ($product->metas as $meta)
                                    <section class="row col-12 border-top p-2 mx-1">

                                        <div class="form-group col-6">
                                            <input type="text" name="meta_key[{{ $meta->id }}]" class="form-control form-control-sm"
                                                placeholder="ویژگی..." value="{{ $meta->meta_key }}">
                                        </div>

                                        <div class="form-group col-6">
                                            <input type="text" name="meta_value[]"
                                                class="form-control form-control-sm" placeholder="مقدار..."
                                                value="{{ $meta->meta_value }}">
                                        </div>
                                    </section>
                                @endforeach

                            </section>

                    </section>

                    <button type="submit" class="btn btn-sm btn-warning m-3">ویرایش</button>
                    </form>
                </section>

            </section>

        </section>
    </section>
    </section>
@endsection

@section('script')
    {{-- ! CK Eidtor --}}

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>

    {{-- ! Jalai Date --}}

    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>

    {{-- ! Select2 Service for tags --}}

    <script>
        $(document).ready(function() {
            let tags_input = $("#tags");
            let select_tags = $("#select_tags");
            let default_tags = tags_input.val();
            let default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'تگ ها را وارید نماید',
                tags: true,
                data: default_data
            });

            select_tags.children('option').attr('selected', true).trigger('change');

            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    let selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }

            });
        });
    </script>
@endsection
