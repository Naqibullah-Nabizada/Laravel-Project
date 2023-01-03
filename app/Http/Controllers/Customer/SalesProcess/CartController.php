<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Market\SalesProcess\CartRequest;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function cart()
    {
        if (Auth::check()) {
            $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
            if ($cartItems->count() > 0) {
                $relatedProducts = Product::orderBy('id', 'desc')->get();
                return view('customer.sales-process.cart', compact('cartItems', 'relatedProducts'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login-register-form');
        }
    }


    public function updateCart(Request $request)
    {
        $inputs = $request->all();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        foreach ($cartItems as $cartItem) {
            if (isset($inputs['number'][$cartItem->id])) {
                $cartItem->update(['number' => $inputs['number'][$cartItem->id]]);
            }
        }

        return redirect()->route('customer.sales-porcess.address-and-delivery');
    }


    public function addToCart(CartRequest $request, $id)
    {
        $product = Product::FindOrFail($id);

        if (Auth::check()) {

            $cartItems = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();

            if (!isset($request->color)) {
                $request->color = null;
            }

            if (!isset($request->guarantee)) {
                $request->guarantee = null;
            }

            foreach ($cartItems as $cartItem) {
                if ($cartItem->color_id == $request->color && $cartItem->guarantiy_id == $request->guarantee) {
                    if ($cartItem->number != $request->number) {
                        $cartItem->update(['number' => $request->number]);
                    }
                    return back();
                }
            }

            $inputs = [];
            $inputs['color_id'] = $request->color;
            $inputs['guarantiy_id'] = $request->guarantee;
            $inputs['user_id'] = auth()->user()->id;
            $inputs['product_id'] = $product->id;

            CartItem::create($inputs);

            return back()->with('toast-success', 'کالا موفقانه به سبد خرید شما اضافه شد');
        } else {
            return redirect()->route('login-register-form');
        }
    }


    public function removeFromCart(CartItem $cartItem)
    {
        if ($cartItem->user_id == Auth::user()->id) {
            $cartItem->delete();
        }
        return back()->with('toast-success', 'کالا با موفقیت از سبد خرید حذف شد');
    }
}
