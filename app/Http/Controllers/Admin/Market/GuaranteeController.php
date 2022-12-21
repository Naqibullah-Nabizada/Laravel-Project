<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\Guarantee\StoreGuaranteeRequest;
use App\Http\Requests\Admin\Market\Guarantee\UpdateGuaranteeRequest;
use App\Models\Market\Guarantee;
use App\Models\Market\Product;

class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::FindOrFail($id);
        $guarantees = Guarantee::orderBy('id', 'desc')->where('product_id', $id)->get();
        return view('admin.market.product.guarantee.index', compact('product', 'guarantees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::FindOrFail($id);
        return view('admin.market.product.guarantee.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuaranteeRequest $request, $id)
    {
        $product = Product::FindOrFail($id);
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        Guarantee::create($inputs);
        return redirect()->route('product.guarantee.index', $product->id)->with('swal-success', 'گرانتی با موفقیت اضافه شد');

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
        $guarantee = Guarantee::FindOrFail($id);
        return view('admin.market.product.guarantee.edit', compact('product', 'guarantee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuaranteeRequest $request, $id, Product $product)
    {
            $guarantee = Guarantee::FindOrFail($id);
            $guarantee->update($request->all());

            return redirect()->route('product.guarantee.index', $product)->with('swal-success', 'گرانتی محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Product $product)
    {
        $guarantee = Guarantee::FindOrFail($id);
        $guarantee->destroy($id);
        return redirect()->route('product.guarantee.index', $product)->with('swal-success', 'گرانتی محصول با موفقیت حذف شد');
    }
}
