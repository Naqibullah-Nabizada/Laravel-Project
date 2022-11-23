@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پیج جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">پیج ساز</a></li>
            <li class="breadcrumb-item active"> ایجاد پیج جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش پیج ساز</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('page.store') }}" method="POST" id="form">
                            @csrf

                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام صفحه</label>
                                    <input type="text" name="title" class="form-control form-control-sm"
                                        placeholder="نام صفحه" value="{{ old('title') }}">
                                    @error('title')
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


                                <div class="form-group col-12">
                                    <label class="form-label">برچسپ ها</label>
                                    <input type="hidden" name="tags" value="{{ old('tags') }}" id="tags">

                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                    @error('tags')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">محتوا</label>
                                    <textarea name="body" id="body" rows="7" class="form-control" placeholder="محتوا">{{ old('body') }}</textarea>
                                    @error('body')
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

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
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
