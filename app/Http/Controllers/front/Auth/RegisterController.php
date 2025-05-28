<?php

namespace App\Http\Controllers\front\Auth;

use App\Models\front\User;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use Message_Trait;
    public function show_register()
    {
        if (Auth::user()) {
            return Redirect()->route('profile');
        }
        return view("front.register");
    }

    function register(Request $request)
    {
        if ($request->isMethod('post')) {

            try {
                DB::beginTransaction();
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email|max:150',
                    'password' => 'required|min:8',
                    'confirm-password' => 'required|same:password',
                    'g-recaptcha-response' => ['required', 'captcha']
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل  الاسم',
                    'email.required' => 'من فضلك ادخل البريد الالكتروني ',
                    'email.unique' => 'البريد الالكتروني مستخدم بالفعل ',
                    'email.email' => 'من فضلك ادخل بريد الكتروني بشكل صحيح ',
                    'email.max' => 'من فضلك ادخل بريد الكتروني اقل من 150 حرف ',
                    'password.required' => 'من فضلك ادخل كلمة المرور ',
                    'password.min' => ' من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',
                    'confirm-password.same' => 'من فضلك اكد كلمة المرور بشكل صحيح ',
                    'confirm-password.required' => 'يجب تاكيد كلمة المرور',
                    'g-recaptcha-response.required' => 'من فضلك قم بتأكيد أنك لست روبوتًا',
                    'g-recaptcha-response.captcha' => 'فشل التحقق من reCAPTCHA، يرجى المحاولة مرة أخرى'
                ];

                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'email_confirm' => 1,
                ]);
                ////////////////////// Send Confirmation Email ///////////////////////////////
                ///
                $email = $data['email'];

                $MessageDate = [
                    'name' => $data['name'],
                    "email" => $data['email'],
                    'code' => base64_encode($email)
                ];
                // Mail::send('front.mails.UserActivationEmail', $MessageDate, function ($message) use ($email) {
                //     $message->to($email)->subject(' تفعيل الحساب الخاص بك  ');
                // });
                DB::commit();
                return $this->success_message('تم انشاء الحساب بنجاح من فضلك فعل حسابك من خلال البريد المرسل  ⚡️');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('front.register');
    }


    // Active User Email
    public function UserConfirm($email)
    {
        $email = base64_decode($email);
        // check if this email exist in users or not
        $user_details = User::where('email', $email)->first();
        $userCount = User::where('email', $email)->count();
        if ($userCount > 0) {
            if ($user_details->account_status == 1) {
                //$message = 'تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان ';
                // return redirect('login')->with('Error_Message', $message);
                return redirect('login')->withErrors([' تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان  '])->withInput();
            } else {
                // Update User Status
                User::where('email', $email)->update(['account_status' => 1]);
                // Redirect User To Login/ Regitser Page With Message
                $message = 'تم تفعيل البريد الالكتروني الخاص بك يمكنك تسجيل الدخول الان ';
                return redirect('login')->with('Success_message', $message);
            }
        } else {
            abort(404);
        }
    }
}
