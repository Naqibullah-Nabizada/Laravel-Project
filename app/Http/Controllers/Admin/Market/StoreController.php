<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\Store\AddToStoreRequest;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.market.store.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToStore($id)
    {
        $product = Product::FindOrFail($id);
        return view('admin.market.store.add-to-store', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddToStoreRequest $request, $id)
    {
        $product = Product::FindOrFail($id);
        $product->marketable_number += $request->marketable_number;
        $product->save();
        Log::info("
        reveiver => {$request->receiver},
        deliverer => {$request->deliverer},
        description => {$request->description},
        add => {$request->marketable_number}
        ");
        return redirect()->route('product.store.index')->with('swal-success', 'موجودی جدید با موفقیت ثبت شد');
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
    public function edit($id)
    {
        $product = Product::FindOrFail($id);
        return view('admin.market.store.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::FindOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.store.index')->with('swal-success', 'موجودی انبار با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
