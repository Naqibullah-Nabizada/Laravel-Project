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
                            <h2 class="content-header-title col-11 mx-auto">
                                <span>تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال) </span>
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
                                <section class="content-header mb-3 col-11 mx-auto">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب آدرس و مشخصات گیرنده
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                <section
                                    class="address-alert alert alert-primary d-flex align-items-center p-2 col-11 mx-auto"
                                    role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <section>
                                        پس از ایجاد آدرس، آدرس را انتخاب کنید.
                                    </section>
                                </section>

                                <section class="address-add-wrapper col-11 mx-auto">


                                </section>

                                <hr>

                                <section class="address-select col-11 mx-auto">
                                    <section>
                                        <p class="alert alert-primary p-1"><i class="fa fa-plus mx-2 text-dark"></i>ایجاد
                                            آدرس</p>
                                    </section>
                                    <section>
                                        <form class="row" action="{{ route('customer.sales-porcess.add-address') }}"
                                            method="POST">
                                            @csrf
                                            <section class="col-6 mb-2">
                                                <label for="province" class="form-label mb-1">ولایت</label>
                                                <select name="province_id" class="form-select form-select-sm"
                                                    id="province">
                                                    <option selected>ولایت را انتخاب کنید</option>
                                                    @foreach ($provinces as $province)
                                                        <option {{-- {{ $address->province_id == $province->id ? 'selected' : '' }} --}}
                                                            data-url="{{ route('customer.sales-porcess.get-cities', $province->id) }}"
                                                            value="{{ $province->id }}">
                                                            {{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('province_id')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="city" class="form-label mb-1">شهر</label>
                                                <select name="city_id" class="form-select form-select-sm" id="city">
                                                    <option selected>شهر را انتخاب کنید</option>
                                                </select>
                                                @error('city_id')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>
                                            <section class="col-12 mb-2">
                                                <label for="address" class="form-label mb-1">نشانی</label>
                                                <input name="address" type="text" class="form-control form-control-sm"
                                                    id="address" placeholder="نشانی" value="{{ old('address') }}">
                                                @error('address')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="postal_code" class="form-label mb-1">کد
                                                    پستی</label>
                                                <input name="postal_code" type="text"
                                                    class="form-control form-control-sm" id="postal_code"
                                                    placeholder="کد پستی" value="{{ old('postal_code') }}">
                                                @error('postal_code')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-3 mb-2">
                                                <label for="no" class="form-label mb-1">پلاک</label>
                                                <input name="no" type="text" class="form-control form-control-sm"
                                                    id="no" placeholder="پلاک" value="{{ old('no') }}">
                                                @error('no')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-3 mb-2">
                                                <label for="unit" class="form-label mb-1">واحد</label>
                                                <input name="unit" type="text" class="form-control form-control-sm"
                                                    id="unit" placeholder="واحد" value="{{ old('unit') }}">
                                                @error('unit')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="border-bottom mt-2 mb-3"></section>

                                            <section class="col-12 mb-2">
                                                <section class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receiver"
                                                        id="receiver">
                                                    <label class="form-check-label" value="null" for="receiver">
                                                        گیرنده سفارش خودم نیستم (اطلاعات زیر تکمیل شود)
                                                    </label>
                                                </section>
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="first_name" class="form-label mb-1">نام
                                                    گیرنده</label>
                                                <input type="text" name="recipient_first_name"
                                                    class="form-control form-control-sm" id="first_name"
                                                    placeholder="نام گیرنده" value="{{ old('recipient_first_name') }}">
                                                @error('recipient_first_name')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="last_name" class="form-label mb-1">نام
                                                    خانوادگی گیرنده</label>
                                                <input type="text" name="recipient_last_name"
                                                    class="form-control form-control-sm" id="last_name"
                                                    placeholder="نام خانوادگی گیرنده"
                                                    value="{{ old('recipient_last_name') }}">
                                                @error('recipient_last_name')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="mobile" class="form-label mb-1">شماره
                                                    موبایل</label>
                                                <input type="text" name="mobile" class="form-control form-control-sm"
                                                    id="mobile" placeholder="شماره موبایل"
                                                    value="{{ old('mobile') }}">
                                                @error('mobile')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="py-1">
                                                <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                    آدرس</button>
                                            </section>
                                        </form>
                                    </section>
                                    <hr>
                                    @foreach (auth()->user()->addresses as $address)
                                        <input type="radio" name="address_id" form="myForm"
                                            value="{{ $address->id }}" id="a-{{ $address->id }}" />
                                        <label for="a-{{ $address->id }}" class="address-wrapper mb-2 p-2">
                                            <section class="mb-2">
                                                <i class="fa fa-map-marker-alt mx-1"></i>
                                                آدرس : {{ $address->address ?? '-' }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-user-tag mx-1"></i>
                                                گیرنده :
                                                {{ $address->recipient_first_name ?? '-' }}
                                                {{ $address->recipient_last_name ?? '-' }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-mobile-alt mx-1"></i>
                                                موبایل گیرنده: {{ $address->user->mobile ?? '-' }}
                                            </section>
                                            <a class="text-dark fw-bold"
                                                href="{{ route('customer.sales-porcess.edit-address', $address->id) }}"><i
                                                    class="fa fa-edit"></i> ویرایش آدرس</a>
                                            <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                        </label>
                                    @endforeach
                                    @error('address_id')
                                        <p class="text-danger my-2">{{ $message }}</p>
                                    @enderror
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
                                    <p class="text-muted">قیمت کالاها {{ $cartItems->count() }}</p>
                                    <p class="text-muted" id="total_product_price">
                                        {{ priceFormat($totalProductPrice) }} دالر</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder" id="total_discount">
                                        {{ priceFormat($totalDiscount) }} دالر</p>
                                </section>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder" id="total_price">
                                        {{ priceFormat($totalProductPrice - $totalDiscount) }} دالر
                                    </p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">هزینه ارسال</p>
                                    {{-- <p class="text-warning">{{ $deliveryMethods->amount }} دالر</p> --}}
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که
                                    انتخاب می کنید در مدت زمان ذکر شده ارسال می شود.
                                </p>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">مبلغ قابل پرداخت</p>
                                    <p class="fw-bold">374,000 تومان</p>
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

                    <section class="content-wrapper bg-white py-3 rounded-2 mb-4">

                        <!-- start vontent header -->
                        <section class="content-header mb-3 col-11 mx-auto">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    <i class="fa fa-shipping-fast mx-2"></i>انتخاب نحوه ارسال
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <section class="delivery-select col-11 mx-auto">

                            <section class="address-alert alert alert-primary d-flex align-items-center p-2"
                                role="alert">
                                <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                <section>
                                    نحوه ارسال کالا را انتخاب کنید. هنگام انتخاب لطفا مدت زمان ارسال را در نظر
                                    بگیرید.
                                </section>
                            </section>

                            @foreach ($deliveryMethods as $deliveryMethod)
                                <input type="radio" name="delivery_id" form="myForm"
                                    value="{{ $deliveryMethod->id }}" id="d-{{ $deliveryMethod->id }}" />
                                <label for="d-{{ $deliveryMethod->id }}"
                                    class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                    <section class="mb-2">
                                        <i class="fa fa-shipping-fast mx-1"></i>
                                        {{ $deliveryMethod->name }}
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-calendar-alt mx-1"></i>
                                        تامین کالا از {{ $deliveryMethod->delivery_time }}
                                        {{ $deliveryMethod->delivery_time_unit }} کاری آینده
                                    </section>
                                </label>
                            @endforeach

                            @error('delivery_id')
                                <p class="text-danger my-2">{{ $message }}</p>
                            @enderror

                            <section class="">
                                <button type="submit" onclick="document.getElementById('myForm').submit()"
                                    class="btn btn-sn btn-danger my-3">ادامه فرآیند
                                    خرید</button>
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
        $(document).ready(function() {
            $('#province').change(function() {
                let element = $('#province option:selected');
                let url = element.attr('data-url');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        if (response.status) {
                            let cities = response.cities;
                            $('#city').empty();
                            cities.map((city) => {
                                $('#city').append($('<option/>').val(city.id).text(city
                                    .name));
                            });
                        } else {
                            errorToast('خطا پیش آمده است');
                            console.log(error);

                        }
                    },
                    error: function() {
                        console.log(error);
                        errorToast('خطا پیش آمده است');
                    }
                });

            })
        });
    </script>

    <script>
        $("#receiver").on('click', function() {
            $("#receiver").val("checked");
        })
    </script>

    <script>
        setTimeout(() => {
            $('.toast').hide();
        }, 7000);

        $(".btn-close").on('click', function() {
            $('.toast').hide();
        });
    </script>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            bill();

            $('.cart-number').on('click', function() {
                bill();
            })

        });

        function bill() {
            let total_product_price = 0;
            let total_discount = 0;
            let total_price = 0;

            $('.number').each(function() {

                let productPrice = parseFloat($(this).data('product-price'));
                let productDiscount = parseFloat($(this).data('product-discount'));
                let number = parseFloat($(this).val());

                total_product_price += productPrice * number;
                total_discount += productDiscount * number;
            });

            total_price = total_product_price - total_discount;

            $('#total_product_price').html(toFarsiNumber(total_product_price));
            $('#total_discount').html(toFarsiNumber(total_discount));
            $('#total_price').html(toFarsiNumber(total_price));
        }

        function toFarsiNumber(number) {
            const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            // add comma
            number = new Intl.NumberFormat().format(number);
            //convert to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }
    </script>



    <script>
        setTimeout(() => {
            $('.toast').hide();
        }, 7000);

        $(".btn-close").on('click', function() {
            $('.toast').hide();
        });
    </script>



    {{-- !Toast --}}
    <script>
        $('.product-add-to-favorite button').click(function() {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function(result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast-section').removeClass('d-none');
                        $('.toast-section').addClass('d-flex');
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>
@endsection
