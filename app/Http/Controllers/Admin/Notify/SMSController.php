<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\SMS\StoreSMSRequest;
use App\Http\Requests\Admin\Notify\SMS\UpdateSMSRequest;
use App\Models\Notify\SMS;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sms = SMS::orderBy('id', 'desc')->get();
        return view('admin.notify.sms.index', compact('sms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSMSRequest $request)
    {


        $sms = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $sms['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        SMS::create($sms);
        return redirect()->route('sms.index')->with('swal-success', 'پیام با موفقیت اضافه شد');
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
        $sms = SMS::FindOrFail($id);
        return view('admin.notify.sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSMSRequest $request, $id)
    {
        $sms = SMS::FindOrFail($id);

        $items = $request->all();

        //! fixed date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $items['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $sms->update($items);
        return redirect()->route('sms.index')->with('swal-success', 'پیام با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sms = SMS::FindOrFail($id);
        $sms->destroy($id);
        return redirect()->route('sms.index')->with('swal-success', 'پیام با موفقیت حذف شد');
    }
}
