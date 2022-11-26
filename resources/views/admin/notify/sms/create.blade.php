@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>ایجاد اطلاعیه پیامکی</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"> <a href="#">اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item active"> ایجاد اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اطلاعیه پیامکی</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('sms.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('sms.store') }}" method="POST">
                            @csrf
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">عنوان پیام</label>
                                    <input type="text" name="title" class="form-control form-control-sm"
                                        placeholder="عنوان پیام" value="{{ old('title') }}">
                                    @error('title')
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

                                <div class="form-group col-12">
                                    <label class="form-label">محتوا</label>
                                    <textarea name="body" rows="7" class="form-control" placeholder="محتوا">{{ old('body') }}</textarea>
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
