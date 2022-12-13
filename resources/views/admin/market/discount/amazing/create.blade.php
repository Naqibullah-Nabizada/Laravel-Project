@extends('admin.layouts.master')

@section('head-tag')
    <title>افزودن کالا به فروش شگفت انگیز</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">فروش شگفت انگیز</a></li>
            <li class="breadcrumb-item active"> افزودن کالا به فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش افزودن کالا به فروش شگفت انگیز</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin.market.discount.amazingSale') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('admin.market.discount.amazingSale.store') }}" method="POST">
                            @csrf
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">انتخاب کالا</label>
                                    <select name="product_id" class="form-control form-control-sm">
                                        <option>کالا را انتخاب کنید</option>
                                        @foreach ($products as $product)
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
                                    <label class="form-label">میزان تخفیف</label>
                                    <input type="text" name="percentage" class="form-control form-control-sm"
                                        placeholder="میزان تخفیف" value="{{ old('percentage') }}">
                                    @error('percentage')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ شروع تخفیف</label>
                                    <input type="text" name="start_date" id="start_date"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="start_date_view" class="form-control form-control-sm"
                                        placeholder="تاریخ شروع تخفیف" value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ پایان تخفیف</label>
                                    <input type="text" name="end_date" id="end_date"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="end_date_view" class="form-control form-control-sm"
                                        placeholder="تاریخ پایان تخفیف" value="{{ old('end_date') }}">
                                    @error('end_date')
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
@section('script')
    {{-- ! Jalai Date --}}

    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#start_date_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }

            })

            $('#end_date_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#end_date',
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
