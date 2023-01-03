<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Market\SalesProcess\CopanRequest;
use App\Models\Market\CartItem;
use App\Models\Market\Copan;
use App\Models\Market\Order;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment()
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        return view('customer.sales-process.payment', compact('order', 'cartItems'));
    }



    public function copanDiscount(CopanRequest $request)
    {
        $copan = Copan::where([['code', $request->copan], ['status', 1,], ['end_date', '>', now()], ['start_date', '<', now()]])->first();

        if ($copan != null) {

            if ($copan->user_id != null) {
                $copan = Copan::where([['code', $request->copan], ['status', 1,], ['end_date', '>', now()], ['start_date', '<', now()], ['user_id', Auth::user()->id]])->first();

                if ($copan == null) {
                    return redirect()->back();
                }
            }

            $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->where('copan_id', null)->first();

            if ($order) {
                if ($copan->amount_type == 0) {
                    $copanDiscountAmount = $order->order_final_amount * ($copan->amount / 100);
                    if ($copanDiscountAmount > $copan->discount_ceiling) {
                        $copanDiscountAmount = $copan->discount_ceiling;
                    }
                } else {
                    $copanDiscountAmount = $copan->amount;
                }

                $order->order_final_amount = $order->order_final_amount - $copanDiscountAmount;
                $finalDiscount = $order->order_total_products_discount_amount + $copanDiscountAmount;

                $order->update(
                    [
                        'copan_id' => $copan->id,
                        'order_copan_discount_amount' => $copanDiscountAmount,
                        'order_total_products_discount_amount' => $finalDiscount
                    ]
                );

                return redirect()->back()->with('toast-success', 'تخفیف با موفقیت اعمال شد');
            } else {
                return redirect()->back()->with('toast-error', 'کد تخفیف نا معتبر است');
            }
        } else {
            return redirect()->back()->with('toast-error', 'کد تخفیف نا معتبر است');
        }
    }
}
