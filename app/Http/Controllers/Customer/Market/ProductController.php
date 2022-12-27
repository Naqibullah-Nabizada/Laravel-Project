<?php

namespace App\Http\Controllers\Customer\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Market\Product\CommentRequest;
use App\Models\Content\Comment;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product($id)
    {
        Auth::loginUsingId(1);
        $product = Product::FindOrFail($id);
        $relatedProducts = Product::orderBy('id', 'desc')->get();
        return view('customer.market.product.product', compact('relatedProducts', 'product'));
    }

    public function addComment(CommentRequest $request, $id)
    {
        $product = Product::FindOrFail($id);
        $inputs['body'] = str_replace(PHP_EOL, '</br>', $request->body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        Comment::create($inputs);
        return redirect()->route('customer.market.product', $product->id)->with('swal-success', 'دیدگاه شما ثبت شد');
    }


    public function addToFavorite($id)
    {
        $product = Product::FindOrFail($id);

        if(Auth::check()){
            $product->user()->toggle([Auth::user()->id]);

            if($product->user->contains(Auth::user()->id)){
                return response()->json(['status' => 1]);
            }else{
                return response()->json(['status' => 2]);
            }
        }else{
            return response()->json(['status' => 3]);
        }
    }
}
