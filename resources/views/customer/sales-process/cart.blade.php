@extends('customer.layouts.master-two-col')

@section('head-tags')
    <title>سبد خرید شما</title>
@endsection


@section('content')
    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        <!-- start cart -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="row mt-4">
                            <section class="col-md-9 mb-3">

                                <form id="cart_item" method="POST" class="content-wrapper bg-white p-3 rounded-2">
                                    @csrf
                                    @php
                                        $totalProductPrice = 0;
                                        $totalDiscount = 0;
                                    @endphp

                                    @foreach ($cartItems as $cartItem)
                                        @php
                                            $totalProductPrice += $cartItem->cartItemProductPrice();
                                            $totalDiscount += $cartItem->cartItemProductDiscount();

                                        @endphp
                                        <section class="cart-item d-md-flex py-3">
                                            <section class="cart-img align-self-start flex-shrink-1"><img
                                                    src="{{ $cartItem->product->image['indexArray']['medium'] }}"></section>
                                            <section class="align-self-start w-100">
                                                <p class="fw-bold">{{ $cartItem->product->name }}</p>
                                                @if (!empty($cartItem->color))
                                                    <p><span style="background-color: {{ $cartItem->color->color }}"
                                                            class="cart-product-selected-color me-1"></span>
                                                        <span>{{ $cartItem->color->color_name }}</span>
                                                    </p>
                                                @else
                                                    <p>رنگ منتخت موجود نیست</p>
                                                @endif
                                                @if (!empty($cartItem->guarantee))
                                                    <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                        <span>{{ $cartItem->guarantee->name }}</span>
                                                    </p>
                                                @else
                                                    <p>گرانتی ندارد</p>
                                                @endif

                                                <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                                    <span>کالا موجود در انبار</span>
                                                </p>
                                                <section>
                                                    <section class="cart-product-number d-inline-block ">
                                                        <button class="cart-number cart-number-down"
                                                            type="button">-</button>
                                                        <input class="number" name="number[{{ $cartItem->id }}]"
                                                            data-product-price={{ $cartItem->cartItemProductPrice() }}
                                                            data-product-discount={{ $cartItem->cartItemProductDiscount() }}
                                                            type="number" min="1" max="5" step="1"
                                                            value="{{ $cartItem->number }}" readonly="readonly">
                                                        <button class="cart-number cart-number-up" type="button">+</button>
                                                    </section>
                                                    <a class="text-decoration-none ms-4 cart-delete"
                                                        href="{{ route('customer.sales-porcess.remove-from-cart', $cartItem) }}"><i
                                                            class="fa fa-trash-alt"></i> حذف از سبد</a>
                                                </section>
                                            </section>
                                            @if (!empty($cartItem->product->activeAmazingSales()))
                                                <section class="align-self-end flex-shrink-1">
                                                    <section
                                                        class="cart-item-discount text-danger text-nowrap mb-1 fw-bold">
                                                        تخفیف {{ priceFormat($cartItem->cartItemProductDiscount()) }}
                                                    </section>
                                                    <section class="text-nowrap fw-bold">
                                                        {{ priceFormat($cartItem->cartItemProductPrice()) }} دالر</section>
                                                </section>
                                            @endif

                                        </section>
                                    @endforeach

                                </form>

                            </section>
                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">قیمت کالاها</p>
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

                                    <p class="my-3">
                                        <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای
                                        ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب
                                        کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت
                                        پرداخت این سفارش صورت میگیرد.
                                    </p>


                                    <section class="">
                                        <button onclick="document.getElementById('cart_item').submit()"
                                            class="btn btn-sm btn-danger w-100">تکمیل فرآیند خرید</button>
                                    </section>

                                </section>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->




        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>کالاهای مرتبط با سبد خرید شما</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    @foreach ($relatedProducts as $relatedProduct)
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                    </section>
                                                    @guest
                                                        <section class="product-add-to-favorite position-relative top-0">
                                                            <button type="button"
                                                                class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.product.addToFavorite', $relatedProduct->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه کردن به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    @endguest
                                                    @auth
                                                        @if ($relatedProduct->user->contains(auth()->user()->id))
                                                            <section class="product-add-to-favorite position-relative top-0">
                                                                <button type="button" class="btn btn-sm"
                                                                    data-url="{{ route('customer.market.product.addToFavorite', $relatedProduct->id) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                    <i class="fa fa-heart text-danger"></i>
                                                                </button>
                                                            </section>
                                                        @else
                                                            <section class="product-add-to-favorite position-relative top-0">
                                                                <button type="button" class="btn btn-sm"
                                                                    data-url="{{ route('customer.market.product.addToFavorite', $relatedProduct->id) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                    <i class="fa fa-heart"></i>
                                                                </button>
                                                            </section>
                                                        @endif
                                                    @endauth
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img
                                                                src="{{ $relatedProduct->image['indexArray']['medium'] }}">
                                                        </section>
                                                        <section class="product-name">
                                                            <h3>{{ Str::limit($relatedProduct->name, 50) }}</h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">
                                                                {{ priceFormat($relatedProduct->price) }} دالر</section>
                                                        </section>
                                                        <section class="product-colors">
                                                            @foreach ($relatedProduct->colors()->get() as $color)
                                                                <section class="product-colors-item"
                                                                    style="background-color: {{ $color->color }}">
                                                                </section>
                                                            @endforeach
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                    @endforeach
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>

    </main>
    <!-- end main one col -->
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
