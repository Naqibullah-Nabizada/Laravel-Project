@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

    <title>ویرایش اطلاعیه ایمیلی</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"> <a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active"> ویرایش اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اطلاعیه ایمیلی</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('email.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('email.update', $email->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">موضوع ایمیل</label>
                                    <input type="text" name="subject" class="form-control form-control-sm"
                                        placeholder="موضوع ایمیل" value="{{ old('subject', $email->subject) }}">
                                    @error('subject')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at"
                                        class="form-control form-control-sm d-none" value="{{ $email->published_at }}">
                                    <input type="text" id="published_at_view" class="form-control form-control-sm"
                                        placeholder="تاریخ انتشار" value="{{ $email->published_at }}">
                                    @error('published_at')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status', $email->status) == 0) selected @endif>
                                            غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $email->status) == 1) selected @endif>
                                            فعال
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">محتوا</label>
                                    <textarea name="body" id="body" rows="7" class="form-control" placeholder="محتوا">{{ old('body', $email->body) }}</textarea>
                                    @error('body')
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
        CKEDITOR.replace('body');
    </script>

    {{-- ! Jalai Date --}}

    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }

            })
        });
    </script>
@endsection
