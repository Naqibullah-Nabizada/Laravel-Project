@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش دسته بندی تیکت</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش تیکت </a></li>
            <li class="breadcrumb-item"> <a href="#">دسته بندی تیکت </a></li>
            <li class="breadcrumb-item active"> ویرایش دسته بندی تیکت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش ویرایش دسته بندی تیکت</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('ticket.category.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('ticket.category.update', $ticketCategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <section class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام دسته</label>
                                    <input type="text" name="name"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="نام دسته" value="{{ old('name', $ticketCategory->name) }}">
                                    @error('name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">وضعیت</label>
                                    <select name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                        <option value="0" @if (old('status', $ticketCategory->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $ticketCategory->status) == 1) selected @endif>فعال
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

