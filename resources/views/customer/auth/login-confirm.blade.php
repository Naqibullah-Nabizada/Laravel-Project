@extends('customer.layouts.master-simple')

@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">

        <form action="{{ route('login-confirm', $token) }}" method="POST">
            @csrf
            <section class="login-wrapper mb-5">
                <section class="login-logo">
                    <img src="{{ asset('customer-assets/images/logo/4.png') }}">
                </section>
                <section class="login-title">
                    <a href="{{ route('login-register-form') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-arrow-alt-circle-right mx-1"></i>
                        بازگشت
                    </a>
                </section>
                <section class="login-title text-center">کد تائید را وارد کنید</section>
                <section class="login-info">
                    کد تائید برای ایمیل {{ $OTP->login_id }} ارسال گردید
                </section>
                <section class="login-input-text">
                    <input type="text" name="otp" class="form-control mb-2" placeholder="کد تائید"
                        value="{{ old('otp') }}">
                    @error('otp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2">
                    <button type="submit" class="btn btn-danger">تائید</button>
                </section>

                <section id="resend-otp" class="d-none">
                    <a href="{{ route('login-resend-otp', $token) }}" class="text-decoration-none text-primary">دریافت مجدد کد تائید</a>
                </section>

                <section id="timer" class="text-center">

                </section>

            </section>
        </form>
    </section>
@endsection

@section('script')
    @php
        $timer = ((new \Carbon\Carbon($OTP->created_at))
        ->addMinutes(5)->timestamp - \Carbon\Carbon::now()->timestamp)
        * 1000;
    @endphp

    <script>
        let countDownDate = new Date().getTime() + {{ $timer }};
        let timer = $('#timer');
        let resendOtp = $('#resend-otp');


        let x = setInterval(function() {

            let now = new Date().getTime();
            let distance = countDownDate - now;

            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (minutes === 0) {
                timer.html(`${seconds}`);
            } else {
                timer.html(`${seconds} : 0${minutes}`);
            }

            if (distance < 0) {
                clearInterval(x);
                timer.addClass("d-none");
                resendOtp.removeClass("d-none");
            }

        }, 1000);
    </script>
@endsection
