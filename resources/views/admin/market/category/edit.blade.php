@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش دسته بندی</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active"> ویرایش دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش دسته بندی</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('category.update', $productCategory->id) }}" method="POST"
                            enctype="multipart/form-data" id="form">
                            @csrf
                            @method('PUT')
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام دسته</label>
                                    <input type="text" name="name"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="نام دسته" value="{{ old('name', $productCategory->name) }}">
                                    @error('name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">برچسپ ها</label>
                                    <input type="hidden" name="tags" value="{{ old('tags', $productCategory->tags) }}"
                                        id="tags">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                    @error('tags')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status', $productCategory->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $productCategory->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نمایش در منو</label>
                                    <select name="show_in_menu"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('show_in_menu', $productCategory->show_in_menu) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('show_in_menu', $productCategory->show_in_menu) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                    @error('show_in_menu')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" name="image"
                                        class="form-control form-control-sm @error('image') is-invalid @enderror">
                                    @error('image')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror

                                    <section class="row my-2">
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($productCategory->image['indexArray'] as $key => $value)
                                            <section class="col-md-{{ 6 / $number }}">
                                                <div class="form-check">
                                                    <input type="radio" name="currentImage" id="{{ $number }}"
                                                        class="form-check-input" value="{{ $key }}"
                                                        @if ($productCategory->image['currentImage'] == $key) checked @endIf>
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
                                    <label class="form-label">منوی والد</label>
                                    <select name="parent_id" class="form-control form-control-sm">
                                        <option value="{{ null }}">منوی اصلی</option>
                                        @foreach ($parentCategories as $parentCategory)
                                            <option value="{{ $parentCategory->id }}"
                                                @if (old('parent_id', $productCategory->parent_id) === $parentCategory->id) selected @endif>
                                                {{ $parentCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">محتوا</label>
                                    <textarea name="description" id="description" rows="7"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="محتوا">{{ old('description', $productCategory->description) }}</textarea>
                                    @error('description')
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


@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
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
