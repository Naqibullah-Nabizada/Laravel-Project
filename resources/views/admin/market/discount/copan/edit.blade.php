@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کوپن جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">کوپن</a></li>
            <li class="breadcrumb-item active"> ویرایش کوپن</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ویرایش کوپن</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('admin.market.discount.copan') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('admin.market.discount.copan.update', $copan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نوع کوپن</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="0" @if (old('type', $copan->type) === 0) selected @endif>عمومی
                                        </option>
                                        <option value="1" @if (old('type', $copan->type) === 1) selected @endif>خصوصی
                                        </option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">کاربر</label>
                                    <select name="user_id" id="users" class="form-control form-control-sm" disabled>
                                        <option>انتخاب کاربر</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if (old('user_id', $user->id) == $copan->user->id) selected @endif>{{ $user->fullName }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">کد کوپن</label>
                                    <input type="text" name="code" class="form-control form-control-sm"
                                        placeholder="کد کوپن" value="{{ old('code', $copan->code) }}">
                                    @error('code')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نوع تخفیف</label>
                                    <select name="amount_type" class="form-control form-control-sm">
                                        <option value="0" @if (old('amount_type', $copan->amount_type) === 0) selected @endif>درصدی
                                        </option>
                                        <option value="1" @if (old('amount_type', $copan->amount_type) === 1) selected @endif>عددی
                                        </option>
                                    </select>
                                    @error('amount_type')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">مقدار تخفیف</label>
                                    <input type="text" name="amount" class="form-control form-control-sm"
                                        placeholder="مقدار تخفیف" value="{{ old('amount', $copan->amount) }}">
                                    @error('amount')
                                        <p class="text-danger my-2">{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">سقف تخفیف</label>
                                    <input type="text" name="discount_ceiling" class="form-control form-control-sm"
                                        placeholder="سقف تخفیف" value="{{ old('discount_ceiling', $copan->discount_ceiling) }}">
                                    @error('discount_ceiling')
                                        <p class="text-danger my-2"> {{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ شروع</label>
                                    <input type="text" name="start_date" id="start_date"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="start_date_view" class="form-control form-control-sm"
                                        placeholder="تاریخ شروع" value="{{ old('start_date', $copan->start_date) }}">
                                    @error('start_date')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تاریخ پایان</label>
                                    <input type="text" name="end_date" id="end_date"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="end_date_view" class="form-control form-control-sm"
                                        placeholder="تاریخ پایان" value="{{ old('end_date', $copan->end_date) }}">
                                    @error('end_date')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status', $copan->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $copan->status) == 1) selected @endif>فعال
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
    <script>
        $('#type').change(function() {
            if ($('#type').find(':selected').val() == 1) {
                $('#users').removeAttr('disabled');
            } else {
                $('#users').attr('disabled', 'disabled');
            }
        })
    </script>

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
