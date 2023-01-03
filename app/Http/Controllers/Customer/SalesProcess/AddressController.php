<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Market\SalesProcess\AddAddressRequest;
use App\Http\Requests\Customer\Market\SalesProcess\ChooseAddressAndDeliveryRequest;
use App\Http\Requests\Customer\Market\SalesProcess\UpdateAddressRequest;
use App\Models\Market\Address;
use App\Models\Market\CartItem;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Delivery;
use App\Models\Market\Order;
use App\Models\Market\Province;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery()
    {
        $user = Auth::user();
        $provinces = Province::orderBy('name')->get();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $deliveryMethods = Delivery::where('status', 1)->get();
        if (empty(CartItem::where('user_id', $user->id)->count())) {
            return redirect()->route('customer.sales-porcess.cart');
        }

        return view('customer.sales-process.address-and-delivery', compact('provinces', 'cartItems', 'deliveryMethods'));
    }

    public function getCities(Province $province)
    {
        $cities = $province->cities;
        if ($cities != null) {
            return response()->json(['status' => true, 'cities' => $cities]);
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function addAddress(AddAddressRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        if ($request->receiver == null) {
            $inputs['recipient_first_name'] = auth()->user()->first_name;
            $inputs['recipient_last_name'] = auth()->user()->last_name;
            $inputs['mobile'] = auth()->user()->mobile;
        }

        Address::create($inputs);
        return back()->with('toast-success', 'آدرس جدید با موفقیت اضافه شد.');
    }


    public function EditAddress($id)
    {
        $user = Auth::user();
        $provinces = Province::orderBy('name')->get();
        $address = Address::where('id', $id)->first();
        return view('customer.sales-process.edit-address', compact('user', 'provinces', 'address'));
    }

    public function UpdateAddress(UpdateAddressRequest $request, $id)
    {
        $address = Address::FindOrFail($id);
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $address->update($inputs);
        return redirect()->route('customer.sales-porcess.address-and-delivery')->with('toast-success', 'آدرس با موفقیت ویرایش شد.');
    }


    public function chooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request)
    {
        $user = Auth::user();
        $inputs = $request->all();

        //! Calc
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $totalProductPrice = 0;
        $totalDiscount = 0;
        $totalFinalPrice = 0;
        $totalFinalDiscountPriceWithNumbers = 0;

        foreach ($cartItems as $cartItem) {
            $totalProductPrice += $cartItem->cartItemProductPrice();
            $totalDiscount += $cartItem->cartItemProductDiscount();
            $totalFinalPrice += $cartItem->cartItemFinalPrice();
            $totalFinalDiscountPriceWithNumbers += $cartItem->cartItemProductDiscount();
        }

        //! Common Discount
        $commonDiscount = CommonDiscount::where([['status', 1], ['end_date', '>', now()], ['start_date', '<', now()]])->first();

        if ($commonDiscount) {

            $inputs['common_discount_id'] = $commonDiscount->id;

            $commonPercentageDiscountAmount = $totalFinalPrice * ($commonDiscount->percentage / 100);

            if ($commonPercentageDiscountAmount > $commonDiscount->discount_ceiling) {
                $commonPercentageDiscountAmount = $commonDiscount->discount_ceiling;
            }

            if ($commonDiscount != null and $totalFinalPrice >= $commonDiscount->minimal_order_amount) {
                $finalPrice = $totalFinalPrice - $commonPercentageDiscountAmount;
            } else {
                $finalPrice = $totalFinalPrice;
            }
        } else {
            $commonPercentageDiscountAmount = null;
            $finalPrice = $totalFinalPrice;
        }

        $inputs['user_id'] = $user->id;
        $inputs['order_final_amount'] = $finalPrice;
        $inputs['order_discount_amount'] = $totalFinalDiscountPriceWithNumbers;
        $inputs['order_common_discount_amount'] = $commonPercentageDiscountAmount;
        $inputs['order_total_products_discount_amount'] = $inputs['order_discount_amount'] + $inputs['order_common_discount_amount'];
        Order::updateOrCreate(
            ['user_id' => $user->id, 'order_status' => 0],
            $inputs
        );
        return redirect()->route('customer.sales-porcess.payment');
    }
}
