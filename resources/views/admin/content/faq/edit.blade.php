@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش پرسش</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">سوالات متداول</a></li>
            <li class="breadcrumb-item active"> ویرایش پرسش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ویرایش پرسش</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('faq.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('faq.update', $faq->id) }}" method="POST" id="form">
                            @csrf
                            @method('PUT')
                            <section class="row">
                                <div class="form-group col-12">
                                    <label class="form-label">سوال</label>
                                    <input type="text" name="question" class="form-control form-control-sm"
                                        placeholder="سوال" value="{{ old('question', $faq->question) }}">
                                    @error('question')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">پاسخ</label>
                                    <textarea name="answer" id="answer" rows="7" class="form-control">{{ old('answer', $faq->answer) }}</textarea>
                                    @error('answer')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">برچسپ ها</label>
                                    <input type="hidden" name="tags" value="{{ old('tags', $faq->tags) }}" id="tags">

                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                    @error('tags')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm">
                                        <option value="0" @if (old('status', $faq->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $faq->status) == 1) selected @endif>فعال
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

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('answer');
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
                placeholder: 'برچسب ها',
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
