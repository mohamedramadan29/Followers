<?php

namespace App\Http\Controllers\admin;

use App\Models\front\Ticket;
use Illuminate\Http\Request;
use App\Models\front\TicketFile;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use Illuminate\Support\Facades\DB;
use App\Models\front\TicketMessage;
use App\Http\Controllers\Controller;
use App\Models\front\SupportTicketFile;
use Illuminate\Support\Facades\Validator;

class SupportTicketsController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    public function index()
    {

        $tickets = Ticket::latest()->get();
        $purchases_count = $tickets->where('support_type', 'payments')->count();
        $orders_count = $tickets->where('support_type', 'orders')->count();
        $urgent_count = $tickets->where('status', 1)->count();
        $normal_count = $tickets->where('status', 0)->count();
        $answered_count = $tickets->where('support_replay_status', 1)->count();
        $closed_count = $tickets->where('status', 2)->count();


        return view('admin.support.tickets', compact('tickets','purchases_count','orders_count','urgent_count','normal_count','answered_count','closed_count'));
    }

    public function showTicket($id)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            abort(404);
        }
        $messages = TicketMessage::with('files','ticket','ticket.user')->where('ticket_id', $id)->get();
       // dd($messages);
        return view('admin.support.ticket-show', compact('ticket', 'messages'));
    }

    ########### Send New Message ############
    public function sendMessage(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $ticket = Ticket::findOrFail($id);
            $data = $request->all();
            //dd($data);

            $rules = [
                'message' => 'required|string|min:5'
            ];
            $messages = [
                'message.required' => 'من فضلك ادخل رسالتك ',
                'message.min' => 'اقل احرف للرسالة هي 5 ارقام ',
                'message.string' => ' من فضلك ادخل نص الرسالة بشكل صحيح  ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $filename = null;
            if ($request->hasFile('file')) {
            $filename = $this->saveImage($request->file('file'), public_path('assets/uploads/support_tickets/'));
            }
            DB::beginTransaction();
            $message = new TicketMessage();

            $message->user_id = $ticket->user_id;
            $message->ticket_id = $ticket->id;
            $message->message = $data['message'];
            $message->sender_type = 'support';
            $message->files = $filename;

            $message->save();
            ####### Update Support Relay Status
            $ticket->support_replay_status = 1;
            $ticket->save();


            DB::commit();
            return $this->success_message(' تم اضافة رسالتك بنجاح  ');
        }
    }

    public function tickets($status)
    {


          ######## Get Count ########
          $purchases_count = Ticket::where('support_type', 'payments')->count();
          $orders_count = Ticket::where('support_type', 'orders')->count();
          $urgent_count = Ticket::where('status', 1)->count();
          $normal_count = Ticket::where('status', 0)->count();
          $answered_count = Ticket::where('support_replay_status', 1)->count();
          $closed_count = Ticket::where('status', 2)->count();
          ######## Get Tickets ########


        $query = Ticket::query();
        if ($status == 'all') {
            $tickets = $query->latest()->get();
        } elseif ($status == 'purchases') {
            $tickets = $query->where('support_type', 'payments')->latest()->get();
        } elseif ($status == 'orders') {
            $tickets = $query->where('support_type', 'orders')->latest()->get();
        } elseif ($status == 'urgent') {
            $tickets = $query->where('status', 1)->latest()->get();
        } elseif ($status == 'normal') {
            $tickets = $query->where('status', 0)->latest()->get();
        } elseif ($status == 'answered') {
            $tickets = $query->where('support_replay_status', 1)->latest()->get();
        } elseif ($status == 'closed') {
            $tickets = $query->where('status', 2)->latest()->get();
        }

        return view('admin.support.tickets', compact('tickets','purchases_count','orders_count','urgent_count','normal_count','answered_count','closed_count'));
    }
}
