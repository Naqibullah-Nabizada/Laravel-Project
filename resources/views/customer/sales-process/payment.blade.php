@extends('customer.layouts.master-two-col')

@section('head-tags')
    <title>آدرس شما</title>
@endsection


@section('content')
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>انتخاب نوع پرداخت </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            کد تخفیف
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                <section class="payment-alert alert alert-primary d-flex align-items-center p-2"
                                    role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <section>
                                        کد تخفیف خود را در این بخش وارد کنید.
                                    </section>
                                </section>

                                <section class="row">
                                    <section class="col-md-5">
                                        <form action="{{ route('customer.sales-porcess.copan-discount') }}" method="POST">
                                            <section class="input-group input-group-sm">
                                                @csrf
                                                <input type="text" name="copan" class="form-control"
                                                    placeholder="کد تخفیف را وارد کنید">
                                                <button type="submit" class="btn btn-primary" type="button">اعمال
                                                    کد</button>
                                            </section>
                                            @error('copan')
                                                <p class="text-danger my-2">{{ $message }}</p>
                                            @enderror
                                        </form>

                                    </section>

                                </section>
                            </section>


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب نوع پرداخت
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="payment-select">

                                    <section class="payment-alert alert alert-primary d-flex align-items-center p-2"
                                        role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <section>
                                            برای پیشگیری از انتقال ویروس کرونا پیشنهاد می کنیم روش پرداخت اینترنتی رو پرداخت
                                            کنید.
                                        </section>
                                    </section>

                                    <input type="radio" name="payment_type" value="1" id="d1" />
                                    <label for="d1" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-credit-card mx-1"></i>
                                            پرداخت آنلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            درگاه پرداخت زرین پال
                                        </section>
                                    </label>

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="2" id="d2" />
                                    <label for="d2" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-id-card-alt mx-1"></i>
                                            پرداخت آفلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            حداکثر در 2 روز کاری بررسی می شود
                                        </section>
                                    </label>

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="3" id="d3" />
                                    <label for="d3" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-money-check mx-1"></i>
                                            پرداخت در محل
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            پرداخت به پیک هنگام دریافت کالا
                                        </section>
                                    </label>


                                </section>
                            </section>

                        </section>


                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-4 rounded-2 cart-total-price">
                                @php
                                    $totalProductPrice = 0;
                                    $totalDiscount = 0;

                                @endphp
                                @foreach ($cartItems as $cartItem)
                                    @php
                                        $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                        $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                    @endphp
                                @endforeach

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالا</p>
                                    <p class="text-muted" id="total_product_price">
                                        {{ priceFormat($totalProductPrice) }} دالر</p>
                                </section>

                                @if ($totalDiscount != null)
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالا</p>
                                    <p class="text-danger fw-bolder" id="total_discount">
                                        {{ priceFormat($totalDiscount) }} دالر</p>
                                </section>
                                @endif

                                @if ($order->commonDiscount != null)
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف عمومی</p>
                                    <p class="text-danger fw-bolder" id="total_discount">
                                        {{ priceFormat($order->commonDiscount->percentage) }} فیصد</p>
                                </section>
                                @endif

                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder" id="total_price">
                                        {{ priceFormat($order->order_final_amount) }} دالر
                                    </p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">هزینه ارسال</p>
                                    <p class="text-primary fw-bold">{{ priceFormat($order->delivery->amount) }} دالر</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که
                                    انتخاب می کنید در مدت زمان ذکر شده ارسال می شود.
                                </p>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">مبلغ قابل پرداخت</p>
                                    <p class="fw-bolder">
                                        {{ priceFormat($order->order_final_amount + $order->delivery->amount) }} دالر
                                    </p>
                                </section>

                                {{-- ! Start of form --}}
                                <form action="{{ route('customer.sales-porcess.choose-address-and-delivery') }}"
                                    id="myForm" method="POST">
                                    @csrf
                                </form>
                                {{-- ! End of form --}}


                                <section class="">
                                    <button type="submit" onclick="document.getElementById('myForm').submit()"
                                        class="btn btn-sn btn-danger w-100">ادامه فرآیند
                                        خرید</button>
                                </section>

                            </section>
                        </section>

                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->
@endsection

@section('script')
    <script>
        setTimeout(() => {
            $('.toast').hide();
        }, 7000);

        $(".btn-close").on('click', function() {
            $('.toast').hide();
        });
    </script>
@endsection
