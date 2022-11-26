<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\Email\StoreEmailRequest;
use App\Http\Requests\Admin\Notify\Email\UpdateEmailRequest;
use App\Models\Notify\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::orderBy('id', 'desc')->get();
        return view('admin.notify.email.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmailRequest $request)
    {
        $email = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $email['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));
        Email::create($email);
        return redirect()->route('email.index')->with('swal-success', 'ایمیل با موفقیت اضافه شد');
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
        $email = Email::FindOrFail($id);
        return view('admin.notify.email.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmailRequest $request, $id)
    {
        $email = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $email['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));
        Email::FindOrFail($id)->update($email);
        return redirect()->route('email.index')->with('swal-success', 'ایمیل با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Email::FindOrFail($id);
        $email->destroy($id);
        return redirect()->route('email.index')->with('swal-success', 'ایمیل با موفقیت حذف شد');
    }
}
