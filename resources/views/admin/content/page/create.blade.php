@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پیج جدید</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">پیج ساز</a></li>
            <li class="breadcrumb-item active"> ایجاد پیج جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش پیج ساز</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="" method="">
                            <section class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">نام پیج</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="نام منو">
                                </div>


                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">آدرس پیج</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="لینک منو">
                                </div>

                                <div class="form-group col-12">
                                    <label class="form-label">محتوا</label>
                                    <textarea name="body" id="body" rows="7" class="form-control" placeholder="محتوا"></textarea>
                                </div>

                            </section>

                            <a href="#" class="btn btn-sm btn-primary">ثبت</a>
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
@endsection
