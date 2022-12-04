<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketPriority\StoreTicketPriorityRequest;
use App\Http\Requests\Admin\Ticket\TicketPriority\UpdateTicketPriorityRequest;
use App\Models\Ticket\TicketPriority;
use Illuminate\Http\Request;

class TicketPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = TicketPriority::orderBy('id', 'desc')->get();
        return view('admin.ticket.priority.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.priority.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketPriorityRequest $request)
    {
        TicketPriority::create($request->all());
        return redirect()->route('priority.index')->with('swal-success', 'اولویت بندی تیکت با موفقیت ثبت شد');
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
        $priority = TicketPriority::FindOrFail($id);
        return view('admin.ticket.priority.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketPriorityRequest $request, $id)
    {
        $priority = TicketPriority::FindOrFail($id);
        $priority->update($request->all());
        return redirect()->route('priority.index')->with('swal-success', 'اولویت بندی تیکت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $priority = TicketPriority::FindOrFail($id);
        $priority->destroy($id);
        return redirect()->route('priority.index')->with('swal-success', 'اولویت بندی تیکت با موفقیت حذف شد');
    }
}
