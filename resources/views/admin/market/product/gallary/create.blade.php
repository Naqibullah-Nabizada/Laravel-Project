@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>ایجاد گالری محصول</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"> <a href="#">محصولات</a></li>
            <li class="breadcrumb-item active"> ایجاد گالری محصول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش گالری محصول</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>
                        <form action="{{ route('product.gallary.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <section class="row border-bottom">

                                <div class="form-group col-12 col-md-6">
                                    <label class="form-label">تصویر</label>
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    @error('image')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </div>

                            </section>

                    </section>

                    <button type="submit" class="btn btn-sm btn-primary m-3">ثبت</button>
                    </form>
                </section>

            </section>

        </section>
    </section>
    </section>
@endsection

@section('script')
    {{-- ! CK Eidtor --}}

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>

    {{-- ! Jalai Date --}}

    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>

    {{-- ! Select2 Service for tags --}}

    <script>
        $(document).ready(function() {
            let tags_input = $("#tags");
            let select_tags = $("#select_tags");
            let default_tags = tags_input.val();
            let default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'تگ ها را وارید نماید',
                tags: true,
                data: default_data
            });

            select_tags.children('option').attr('selected', true).trigger('change');

            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    let selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }

            });
        });
    </script>

    <script>
        $(function() {
            $('#btn-copy').on('click', function() {
                let ele = $(this).parent().prev().clone(true);
                $(this).before(ele);
            })
        })
    </script>
@endsection
