@extends('admin.layouts.master')

@section('head-tag')
    <title>
        نظرات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="">خانه</a></li>
            <li class="breadcrumb-item"> <a href="">بخش محتوا</a></li>
            <li class="breadcrumb-item active" aria-current="page"> نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">

                    <h5>بخش نظرات</h5>

                    <div class="d-flex justify-content-between my-3">
                        <a href="#" class="btn btn-sm btn-primary disabled">ایجاد نظر</a>
                        <input type="text" class="form-control form-control-sm col-3" placeholder="جستجو">
                    </div>
                    <hr>

                    <section>
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نظر</th>
                                    <th>پاسخ به</th>
                                    <th>کد کاربر</th>
                                    <th>نوسینده نظر</th>
                                    <th>کد پست</th>
                                    <th>پست</th>
                                    <th class="col-1">وضعیت</th>
                                    <th class="col-1">وضعیت نظر</th>
                                    <th class="col-2"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $key => $comment)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ Str::limit($comment->body, 20) }}</td>
                                        <td>{{ $comment->parent_id ? Str::limit($comment->parent->body, 20) : null }}</td>
                                        <td>{{ $comment->author_id }}</td>
                                        <td>{{ $comment->user->fullName }}</td>
                                        <td>{{ $comment->commentable_id }}</td>
                                        <td>{{ $comment->commentable->title }}</td>
                                        <td>
                                            <a href="{{ route('content.comment.status', $comment->id) }}">
                                                @if ($comment->status == 0)
                                                    <span class="btn btn-sm btn-warning">
                                                        <i class="fa fa-clock"> غیر فعال</i>
                                                    </span>
                                                @else
                                                    <span class="btn btn-sm btn-success">
                                                        <i class="fa fa-check"> فعال</i>
                                                    </span>
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            @if ($comment->approved == 0)
                                                <a href="{{ route('content.comment.approved', $comment->id) }}"
                                                    class="btn btn-sm btn-warning"><i></i>عدم تایید</a>
                                            @else
                                                <a href="{{ route('content.comment.approved', $comment->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fa fa-check mx-1"></i>تایید</a>
                                            @endif
                                        </td>
                                        <td class="text-left">
                                            <a href="{{ route('content.comment.show', $comment->id) }}"
                                                class="btn btn-sm btn-info"><i class="fa fa-eye mx-1"></i>نمایش</a>
                                            <form action="{{ route('content.comment.destroy', $comment->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete">
                                                    <i class="fa fa-trash mx-1"></i>حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>

                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
