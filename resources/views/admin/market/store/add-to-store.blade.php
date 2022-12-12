@extends('admin.layouts.master')

@section('head-tag')
    <title>اضافه کردن به انبار</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">انبار</a></li>
            <li class="breadcrumb-item active"> افافه کردن به انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش اضافه کردن به انبار</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.store.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('product.store.store', $product->id) }}" method="POST">
                            @csrf
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام تحویل گیرنده</label>
                                    <input type="text" name="receiver" class="form-control form-control-sm"
                                        placeholder="نام تحویل گیرنده" value="{{ old('reciver') }}">
                                    @error('receiver')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام تحویل دهنده</label>
                                    <input type="text" name="deliverer" class="form-control form-control-sm"
                                        placeholder="نام تحویل دهنده" value="{{ old('deliverer') }}">
                                    @error('deliverer')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تعداد</label>
                                    <input type="text" name="marketable_number" class="form-control form-control-sm"
                                        placeholder="تعداد" value="{{ old('marketable_number') }}">
                                    @error('marketable_number')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">توضیحات</label>
                                    <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
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
