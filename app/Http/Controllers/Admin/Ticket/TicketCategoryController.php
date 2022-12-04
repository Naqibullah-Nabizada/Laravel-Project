<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategory\StoreTicketCategoryRequest;
use App\Http\Requests\Admin\Ticket\TicketCategory\UpdateTicketCategoryRequest;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketCategories = TicketCategory::orderBy('id', 'desc')->get();
        return view('admin.ticket.category.index', compact('ticketCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ticket.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketCategoryRequest $request)
    {
        TicketCategory::create($request->all());
        return redirect()->route('ticket.category.index')->with('swal-success', 'دسته بندی تیکت با موفقیت ثبت شد');
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
        $ticketCategory = TicketCategory::FindOrFail($id);
        return view('admin.ticket.category.edit', compact('ticketCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketCategoryRequest $request, $id)
    {
        $ticketCategory = TicketCategory::FindOrFail($id);
        $ticketCategory->update($request->all());
        return redirect()->route('ticket.category.index')->with('swal-success', 'دسته بندی تیکت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticketCategory = TicketCategory::FindOrFail($id);
        $ticketCategory->destroy($id);

        return redirect()->route('ticket.category.index')->with('swal-success', 'دسته بندی تیکت با موفقیت حذف شد');
    }
}
