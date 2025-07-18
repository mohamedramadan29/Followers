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
       // $tickets = SupportTicket::latest()->get();
       $tickets = Ticket::latest()->get();
        return view('admin.support.tickets', compact('tickets'));
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
        // $ticket = Ticket::findOrFail($id);
        // $data = $request->all();
        // $rules = [
        //     'message' => 'required|string',
        //     'files.*' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
        // ];
        // $messages = [
        //     'message.required' => 'من فضلك ادخل رسالتك',
        //     'message.string' => 'من فضلك ادخل نص الرسالة بشكل صحيح',
        //     'files.*.mimes' => 'نوع الملف غير مدعوم، يرجى رفع صور أو مستندات (jpg, png, pdf, doc, docx)',
        //     'files.*.max' => 'حجم الملف يتجاوز الحد الأقصى (2 ميجابايت)',
        // ];
        // $validator = Validator::make($data, $rules, $messages);
        // if ($validator->fails()) {
        //     return Redirect()->back()->withInput()->withErrors($validator);
        // }

        // ###### Insert Message
        // TicketMessage::create([
        //     'ticket_id' => $ticket->id,
        //     'sender_username' => 'support',
        //     'receiver_username' => $ticket->sender_username,
        //     'message' => $request->message,
        //     'is_read' => 1,
        // ]);
        // $ticket->update([
        //     'last_message' => $request->message,
        //     'last_time_message' => now(),
        //     'is_read' => 1,
        // ]);
        // ###### Insert Files Message #########

        // #### Is Request has File
        // if ($request->hasFile('files')) {
        //     foreach ($request->file('files') as $file) {
        //         $filename = $this->saveImage($file, public_path('assets/uploads/support_tickets/'));
        //         SupportTicketFile::create([
        //             'ticket_message_id' => $ticket->id,
        //             'file' => $filename,
        //         ]);
        //     }
        // }

        // return $this->success_message('تم اضافة رسالتك بنجاح');


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
}
