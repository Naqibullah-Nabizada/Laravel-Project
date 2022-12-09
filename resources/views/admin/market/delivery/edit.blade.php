@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش روش ارسال</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">روش ارسال</a></li>
            <li class="breadcrumb-item active"> ویرایش روش ارسال </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش روش ارسال </h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('delivery.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('delivery.update', $delivery_method->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام روش ارسال</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        placeholder="نام روش ارسال" value="{{ old('name', $delivery_method->name) }}">
                                    @error('name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">هزینه ارسال</label>
                                    <input type="text" name="amount" class="form-control form-control-sm"
                                        placeholder="هزینه ارسال" value="{{ old('amount', $delivery_method->amount) }}">
                                    @error('amount')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">زمان ارسال</label>
                                    <input type="text" name="delivery_time" class="form-control form-control-sm"
                                        placeholder="زمان ارسال"
                                        value="{{ old('delivery_time', $delivery_method->delivery_time) }}">
                                    @error('delivery_time')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">واحد زمان ارسال</label>
                                    <input type="text" name="delivery_time_unit" class="form-control form-control-sm"
                                        placeholder="واحد زمان ارسال"
                                        value="{{ old('delivery_time_unit', $delivery_method->delivery_time_unit) }}">
                                    @error('delivery_time_unit')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status', $delivery_method->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $delivery_method->status) == 1) selected @endif>فعال
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
