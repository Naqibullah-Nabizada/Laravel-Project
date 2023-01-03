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
                        <section class="col-md-9 mx-auto">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3 col-11 mx-auto">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            ویرایش آدرس و مشخصات گیرنده
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
                                    <section>
                                        <p class="alert alert-primary p-1"><i class="fa fa-edit mx-2 text-dark"></i>ویرایش
                                            آدرس</p>
                                    </section>
                                    <section>
                                        <form class="row"
                                            action="{{ route('customer.sales-porcess.update-address', $address->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <section class="col-6 mb-2">
                                                <label for="province" class="form-label mb-1">ولایت</label>
                                                <select name="province_id" class="form-select form-select-sm"
                                                    id="province-{{ $address->id }}">
                                                    @foreach ($provinces as $province)
                                                        <option
                                                            {{ $address->province_id == $province->id ? 'selected' : '' }}
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
                                                <select name="city_id" class="form-select form-select-sm"
                                                    id="city-{{ $address->id }}">
                                                    <option selected>شهر را انتخاب کنید</option>
                                                </select>
                                                @error('city_id')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>
                                            <section class="col-12 mb-2">
                                                <label for="address" class="form-label mb-1">نشانی</label>
                                                <input name="address" type="text" class="form-control form-control-sm"
                                                    id="address" placeholder="نشانی"
                                                    value="{{ old('address', $address->address) }}">
                                                @error('address')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="postal_code" class="form-label mb-1">کد
                                                    پستی</label>
                                                <input name="postal_code" type="text"
                                                    class="form-control form-control-sm" id="postal_code"
                                                    placeholder="کد پستی"
                                                    value="{{ old('postal_code', $address->postal_code) }}">
                                                @error('postal_code')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-3 mb-2">
                                                <label for="no" class="form-label mb-1">پلاک</label>
                                                <input name="no" type="text" class="form-control form-control-sm"
                                                    id="no" placeholder="پلاک"
                                                    value="{{ old('no', $address->no) }}">
                                                @error('no')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-3 mb-2">
                                                <label for="unit" class="form-label mb-1">واحد</label>
                                                <input name="unit" type="text" class="form-control form-control-sm"
                                                    id="unit" placeholder="واحد"
                                                    value="{{ old('unit', $address->unit) }}">
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
                                                    placeholder="نام گیرنده"
                                                    value="{{ old('recipient_first_name', $address->recipient_first_name) }}">
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
                                                    value="{{ old('recipient_last_name', $address->recipient_last_name) }}">
                                                @error('recipient_last_name')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="mobile" class="form-label mb-1">شماره
                                                    موبایل</label>
                                                <input type="text" name="mobile" class="form-control form-control-sm"
                                                    id="mobile" placeholder="شماره موبایل"
                                                    value="{{ old('mobile', $address->mobile) }}">
                                                @error('mobile')
                                                    <small class="text-danger my-2">{{ $message }}</small>
                                                @enderror
                                            </section>

                                            <section class="py-1">
                                                <button type="submit" class="btn btn-sm btn-warning">ویرایش
                                                    آدرس</button>
                                                <a href="{{ route('customer.sales-porcess.address-and-delivery') }}"
                                                    class="btn btn-sm btn-secondary">بازگشت</a>
                                            </section>
                                        </form>
                                    </section>

                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
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

            });




            // Edit

            let = addresses = {!! auth()->user()->addresses !!}

            addresses.map((address) => {
                let id = address.id;
                let target = `#province-${id}`;
                let selected = `${target} option:selected`;

                $(target).change(function() {
                    let element = $(selected);
                    let url = element.attr('data-url');

                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(response) {
                            if (response.status) {
                                let cities = response.cities;
                                $(`#city-${id}`).empty();
                                cities.map((city) => {
                                    $(`#city-${id}`).append($('<option/>').val(
                                            city.id)
                                        .text(city
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

                });
            });

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
