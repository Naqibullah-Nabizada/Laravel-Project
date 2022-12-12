@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش انبار</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">انبار</a></li>
            <li class="breadcrumb-item active"> ویرایش انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ویرایش انبار</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.store.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('product.store.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تعداد قابل فروش</label>
                                    <input type="text" name="marketable_number" class="form-control form-control-sm"
                                        placeholder="تعداد قابل فروش"
                                        value="{{ old('marketable_number', $product->marketable_number) }}">
                                    @error('marketable_number')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تعداد ریزف شده</label>
                                    <input type="text" name="frozen_number" class="form-control form-control-sm"
                                        placeholder="تعداد ریزف شده"
                                        value="{{ old('frozen_number', $product->frozen_number) }}">
                                    @error('frozen_number')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تعداد فروخته شده</label>
                                    <input type="text" name="sold_number" class="form-control form-control-sm"
                                        placeholder="تعداد فروخته شده"
                                        value="{{ old('sold_number', $product->sold_number) }}">
                                    @error('sold_number')
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
