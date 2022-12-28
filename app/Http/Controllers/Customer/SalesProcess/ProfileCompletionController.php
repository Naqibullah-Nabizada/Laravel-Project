<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Market\SalesProcess\ProfileRequest;
use App\Models\Market\CartItem;
use Illuminate\Support\Facades\Auth;

class ProfileCompletionController extends Controller
{
    public function profileCompletion()
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        return view('customer.sales-process.profile-completion', compact('user', 'cartItems'));
    }


    public function update(ProfileRequest $request)
    {
        Auth::user()->update($request->all());
        return redirect()->route('customer.sales-porcess.address-and-delivery');
    }
}
