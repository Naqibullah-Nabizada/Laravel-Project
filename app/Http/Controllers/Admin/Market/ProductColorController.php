<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductColor\StoreProductColorRequest;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::FindOrFail($id);
        $colors = ProductColor::where('product_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.market.product.color.index', compact('product', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::FindOrFail($id);
        return view('admin.market.product.color.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductColorRequest $request, $id)
    {
        $product = Product::FindOrFail($id);

        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        ProductColor::create($inputs);
        return redirect()->route('product.color.index', $product->id)->with('swal-success', 'رنگ محصول با موفقیت ثیت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Product $product)
    {
        $color = ProductColor::FindOrFail($id);
        return view('admin.market.product.color.edit', compact('color', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Product $product)
    {
        $color = ProductColor::FindOrFail($id);
        $color->update($request->all());

        return redirect()->route('product.color.index', $product)->with('swal-success', 'رنگ محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Product $product)
    {
        $color = ProductColor::FindOrFail($id);
        $color->destroy($id);
        return redirect()->route('product.color.index', $product)->with('swal-success', 'رنگ محصول با موفقیت حذف شد');
    }
}
