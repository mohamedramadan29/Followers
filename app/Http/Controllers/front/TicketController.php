<?php

namespace App\Http\Controllers\front;

use App\Http\Traits\Message_Trait;
use App\Models\front\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\front\TicketMessage;
use App\Http\Controllers\Controller;
use App\Http\Traits\Upload_Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    public function tickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('front.users.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('front.users.tickets.add');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $rules = [
                'title' => 'required|string',
                'message' => 'string|required|min:10',
            ];
            $messages = [
                'title.required' => ' من فضلك ادخل عنوان للتذكرة  ',
                'title.string' => ' من فضلم ادخل عنوان التذكرة بشكل صحيح  ',
                'message.required' => ' من فضلك ادخل رسالتك  ',
                'message.string' => ' من فضلك ادخل نص رسالتك بشكل صحيح  ',
                'message.min' => ' اقل عدد لارسال الرسالة هو 10 احرف من فضلك ادخل رسالتك بشكل واضح  ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('image')) {
                $data['image'] = $this->saveImage($request->file('image'), 'assets/front/uploads/tickets');
            }
            /////////// Ticket /////////////////
            DB::beginTransaction();
            try {
                /////////// Start Ticket
                $ticket = new Ticket();
                $ticket->user_id = Auth::user()->id;
                $ticket->support_type = $data['support_type'];
                $ticket->title = $data['title'];
                $ticket->content = $data['message'];
                $ticket->files = $data['image'];
                $ticket->save();
                ///////////////// Start Message In Ticket  ////////////
                $message = new TicketMessage();
                $message->ticket_id = $ticket->id;
                $message->user_id = Auth::user()->id;
                $message->message = $data['message'];
                $message->sender_type = 'user';
                $message->save();
                DB::commit();
                //return $this->success_message(' تم فتح تذكرة جديدة بنجاح  ');
                return Redirect::route('tickets')->with('Success_message', ' تم فتح تذكرة جديدة بنجاح ');
            } catch (\Exception $e) {
                DB::rollBack();
                return $this->exception_message($e);
            }
        }
    }
}
