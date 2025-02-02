<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Models\front\Contact;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\PublicSetting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $setting = PublicSetting::first();
        return view("front.contact",compact('setting'));
    }
    public function store(Request $request)
    {
        try {

            $data = $request->all();
            $rules = [
                'name' => 'required|string',
                'email' => 'required|email',
                'message' => 'required|min:20',
                'g-recaptcha-response' => ['required', 'captcha']
            ];
            $messages = [
                'name.required' => ' من فضلك ادخل الاسم   ',
                'name.string' => ' من فضلك ادخل الاسم بشكل صحيح ',
                'message.required' => ' من فضلك ادخل الرسالة  ',
                'message.min' => ' من فضلك ادخل رسالتك بشكل كامل اقل عدد حروف هو  20 حرف  ',
                'g-recaptcha-response.required' => 'من فضلك قم بتأكيد أنك لست روبوتًا',
                'g-recaptcha-response.captcha' => 'فشل التحقق من reCAPTCHA، يرجى المحاولة مرة أخرى'
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect()->back()->withInput()->withErrors($validator);
            }
            DB::beginTransaction();
            $message = new Contact();
            $message->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'message' => $data['message'],
            ]);
            //////////// Send Mail To Admin ///////////////////
            $email = env('ADMINEMAIL');
            $MessageDate = [
                'name' => $data['name'],
                'email' => $data['email'],
                'message_body' => $data['message'],
            ];
            Mail::send('front.mails.ContactMessageMail', $MessageDate, function ($message) use ($email) {
                $message->to($email)->subject(' لديك رسالة تواصل  من متجر نايف ');
            });

            DB::commit();

            return $this->success_message('  تم ارسال رسالتك بنجاح سوف نتواصل معك في اقرب وقت ممكن  ');


        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }
}
