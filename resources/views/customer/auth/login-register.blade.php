@extends('customer.layouts.master-simple')

@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <form action="{{ route('login-register') }}" method="POST">
            @csrf
            <section class="login-wrapper mb-5">
                <section class="login-logo">
                    <a href="{{ route('customer.home') }}">
                        <img src="{{ asset('customer-assets/images/logo/4.png') }}">
                    </a>
                </section>
                <section class="login-title">ورود / ثبت نام</section>
                <section class="login-info">ایمیل خود را وارد کنید</section>
                <section class="login-input-text">
                    <input type="text" name="id" class="form-control mb-2" placeholder="ایمیل"
                        value="{{ old('id') }}">
                    @error('id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2">
                    <button type="submit" class="btn btn-danger">ورود به آمازون</button>
                </section>
                <section class="login-terms-and-conditions">
                    <a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام
                </section>
            </section>
        </form>
    </section>
@endsection
