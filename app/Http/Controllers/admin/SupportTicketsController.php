<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\front\SupportTicket;
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
        $tickets = SupportTicket::latest()->get();
        return view('admin.support.tickets', compact('tickets'));
    }

    public function showTicket($id)
    {
        $ticket = SupportTicket::find($id);
        if (!$ticket) {
            abort(404);
        }
        $messages = TicketMessage::with('files')->where('ticket_id', $id)->get();
        return view('dashboard.support.ticket-show', compact('ticket', 'messages'));
    }

    ########### Send New Message ############
    public function sendMessage(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $data = $request->all();
        $rules = [
            'message' => 'required|string',
            'files.*' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
        ];
        $messages = [
            'message.required' => 'من فضلك ادخل رسالتك',
            'message.string' => 'من فضلك ادخل نص الرسالة بشكل صحيح',
            'files.*.mimes' => 'نوع الملف غير مدعوم، يرجى رفع صور أو مستندات (jpg, png, pdf, doc, docx)',
            'files.*.max' => 'حجم الملف يتجاوز الحد الأقصى (2 ميجابايت)',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return Redirect()->back()->withInput()->withErrors($validator);
        }

        ###### Insert Message
        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'sender_username' => 'support',
            'receiver_username' => $ticket->sender_username,
            'message' => $request->message,
            'is_read' => 1,
        ]);
        $ticket->update([
            'last_message' => $request->message,
            'last_time_message' => now(),
            'is_read' => 1,
        ]);
        ###### Insert Files Message #########

        #### Is Request has File
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $this->saveImage($file, public_path('assets/uploads/support_tickets/'));
                SupportTicketFile::create([
                    'ticket_message_id' => $ticket->id,
                    'file' => $filename,
                ]);
            }
        }

        return $this->success_message('تم اضافة رسالتك بنجاح');
    }
}
