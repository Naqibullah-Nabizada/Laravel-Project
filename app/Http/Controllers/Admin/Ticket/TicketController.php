<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\Answer\TicketAnswerRequest;
use App\Models\Ticket\Ticket;

class TicketController extends Controller
{


    public function newTicket()
    {
        $tickets = Ticket::where('seen', 0)->get();
        foreach ($tickets as $ticket) {
            $ticket->seen = 1;
            $ticket->save();
        }
        return view('admin.ticket.index', compact('tickets'));
    }

    public function openTicket()
    {
        $tickets = Ticket::where('status', 0)->get();
        return view('admin.ticket.index', compact('tickets'));
    }

    public function closeTicket()
    {
        $tickets = Ticket::where('status', 1)->get();
        return view('admin.ticket.index', compact('tickets'));
    }



    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.ticket.index', compact('tickets'));
    }



    public function answer(TicketAnswerRequest $request, Ticket $ticket)
    {
        $inputs = $request->all();

        $inputs['subject'] = $ticket->subject;
        $inputs['description'] = $request->description;
        $inputs['reference_id'] = $ticket->reference_id;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['status'] = 1;
        $inputs['user_id'] = 1;
        $inputs['seen'] = 1;
        $inputs['ticket_id'] = $ticket->id;

        Ticket::create($inputs);

        return redirect()->route('ticket.index')->with('swal-success', 'پاسخ شما با موفقیت ثبت شد');
    }


    public function show($id)
    {
        $ticket = Ticket::FindOrFail($id);
        return view('admin.ticket.show', compact('ticket'));
    }


    public function change($id)
    {
        $ticket = Ticket::FindOrFail($id);
        $ticket->status = $ticket->status === 0 ? 1 : 0;
        $ticket->save();
        return redirect()->route('ticket.index')->with('swal-success', 'تغییر با موفقیت ثبت شد');
    }
}
