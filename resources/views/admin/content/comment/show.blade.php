@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش نظر</title>
@endsection

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item"> <a href="#">نظرات</a></li>
            <li class="breadcrumb-item active"> نمایش نظر</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش نظر</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="{{ route('content.comment.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
                    </div>
                    <hr>

                    <section>

                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white">
                                {{ $comment->user->fullName }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">مشخصات کالا:‌ {{ $comment->commentable->title }}</h5>
                                <p class="card-text">{{ $comment->body }}</p>
                            </div>
                        </div>

                        @if ($comment->parent_id == null)
                            <form action="{{ route('content.comment.answer', $comment->id) }}" method="POST">
                                @csrf
                                <section class="col-12 col-md-9 my-2">
                                    <label class="form-label">پاسخ ادمین</label>
                                    <textarea name="body" rows="5" class="form-control" placeholder="پاسخ ادمین"></textarea>
                                    @error('body')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
                                </section>

                                <button type="submit" class="btn btn-sm btn-primary mx-3">ثبت</button>
                            </form>
                        @endif

                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection
