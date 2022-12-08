@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش نقش</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"> <a href="#">مشتریان</a></li>
            <li class="breadcrumb-item active"> ویرایش نقش </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>ویرایش نقش</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('role.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('role.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <section class="row">

                                <div class="form-group col-12 col-md-5">
                                    <label class="form-label">عنوان نقش</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                        placeholder="عنوان نقش" value="{{ old('name', $role->name) }}">
                                    @error('name')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-5">
                                    <label class="form-label">توضیحات نقش</label>
                                    <input type="text" name="description" class="form-control form-control-sm"
                                        placeholder="توضیحات نقش" value="{{ old('description', $role->description) }}">
                                    @error('description')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-2 my-md-auto">
                                    <button type="submit" class="btn btn-sm btn-warning">ویرایش</button>
                                </div>

                            </section>

                        </form>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
