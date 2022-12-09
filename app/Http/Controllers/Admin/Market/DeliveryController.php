<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\Delivery\StoreDeliveryRequest;
use App\Http\Requests\Admin\Market\Delivery\UpdateDeliveryRequest;
use App\Models\Market\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery_methods = Delivery::orderBy('id', 'desc')->get();
        return view('admin.market.delivery.index', compact('delivery_methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryRequest $request)
    {
        Delivery::create($request->all());
        return redirect()->route('delivery.index')->with('swal-success', 'روش ارسال جدید با موفقیت ثبت شد');
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
        $delivery_method = Delivery::FindOrFail($id);
        return view('admin.market.delivery.edit', compact('delivery_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryRequest $request, $id)
    {
        $delivery_method = Delivery::FindOrFail($id);
        $delivery_method->update($request->all());
        return redirect()->route('delivery.index')->with('swal-success', 'روش ارسال با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delivery_method = Delivery::FindOrFail($id);
        $delivery_method->destroy($id);
        return redirect()->route('delivery.index')->with('swal-success', 'روش ارسال با موفقیت حذف شد');
    }
}
