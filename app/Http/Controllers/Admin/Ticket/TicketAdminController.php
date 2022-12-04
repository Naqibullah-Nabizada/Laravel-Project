<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketAdmin;
use App\Models\User;

class TicketAdminController extends Controller
{
    public function index()
    {
        $admins = User::where('user_type', 1)->orderBy('id', 'desc')->get();
        return view('admin.ticket.admin.index', compact('admins'));
    }


    public function set($id)
    {
        TicketAdmin::where('user_id', $id)->first() ? TicketAdmin::where('user_id', $id)->forceDelete() : TicketAdmin::create(['user_id' => $id]);
        return redirect()->route('ticket.admin.index')->with('swal-success', 'تیکت ادمین با موفقیت تغییر کرد');
    }
}
