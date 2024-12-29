<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Notifications\system;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class ticketc extends Controller
{
    public function createticket(Request $request) {
        $incomingFields = $request->validate([
            'fname' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $incomingFields['fname'] = strip_tags($incomingFields['fname']);
        $incomingFields['subject'] = strip_tags($incomingFields['subject']);
        $incomingFields['message'] = strip_tags($incomingFields['message']);
        $incomingFields['user_id'] = auth()->id();
        Ticket::create($incomingFields);
        return view('/dashboard');
    }

    public function index(){
        $tickets = Ticket::orderBy('id', 'desc')->get();
        $total = Ticket::count();
        return view('admin.ticket.home', compact(['tickets', 'total']));
    }

    public function delete($id)
    {  
        $tickets = Ticket::findOrFail($id);
        if ($tickets) {
            $user=$tickets->user_id;
            Notification::send($user ,new system);
            $tickets->status = 1; 
            $tickets->save();
            return redirect(route('admin/ticket'));
        } else {
            session()->flash('error', 'ticket Not resolved');
            return redirect(route('admin/ticket/'));
        }
    }

}
