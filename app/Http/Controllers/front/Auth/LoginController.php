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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use Message_Trait;
    public function show_login()
    {
        if (Auth::user()) {
            return Redirect()->route('orders');
        }
        return view("front.login");

    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required',
                    'g-recaptcha-response' => ['required', 'captcha']
                ];
                $messages = [
                    'email.required' => 'من فضلك ادخل البريد الالكتروني',
                    'email.email' => 'من فضلك ادخل بريد الكتروني صحيح',
                    'password.required' => 'من فضلك ادخل كلمة المرور',
                    'g-recaptcha-response.required' => 'من فضلك قم بتأكيد أنك لست روبوتًا',
                    'g-recaptcha-response.captcha' => 'فشل التحقق من reCAPTCHA، يرجى المحاولة مرة أخرى'
                ];
                $validator = Validator::make($data, $rules, $messages);

                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }

                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $request->remeber)) {
                    if (Auth::user()->account_status == 0) {
                        Auth::logout();
                        return Redirect()->back()->withInput()->withErrors(['من فضلك يجب تفعيل الحساب الخاص بك أولاً']);
                    }
                    return Redirect()->route('orders');
                    //return response()->json(['redirect' => url('user/dashboard')]);
                } else {
                    return Redirect()->back()->withInput()->withErrors(['لا يوجد حساب بهذه البيانات']);
                    // return response()->json(['error' => 'لا يوجد حساب بهذه البيانات'], 401);
                }
            } catch (\Exception $e) {
                return Redirect()->back()->withInput()->withErrors(['حدث خطأ غير متوقع، حاول مرة أخرى']);
                //    return response()->json(['error' => 'حدث خطأ غير متوقع، حاول مرة أخرى'], 500);
            }
        }

        return view('front.login');
        if (Auth::check()) {
            return redirect()->route('orders');
        }

        //  return view('website.login');
    }


    public function forget_password(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $email = $data['email'];
            $user = User::where('email', $email)->count();
            if ($user > 0) {
                ////////////////////// Send Forget Mail To User  ///////////////////////////////
                ///
                DB::beginTransaction();
                $email = $data['email'];
                $MessageDate = [
                    'code' => base64_encode($email)
                ];
                Mail::send('front.mails.UserChangePasswordMail', $MessageDate, function ($message) use ($email) {
                    $message->to($email)->subject(' رابط تغير كلمة المرور ');
                });
                DB::commit();
                return $this->success_message(' تم ارسال رابط تغير كلمة المرور علي البريد الالكتروني  ');
            } else {
                return Redirect::back()->withErrors(['للاسف لا يوجد حساب بهذة البيانات ']);
                // return $this->Error_message(' للاسف لا يوجد حساب بهذة البيانات  ');
            }
        }
        return view('front.forget-password');
    }

    public function change_forget_password(Request $request, $email)
    {
        $email = base64_decode($email);
        return view('front.change-password', compact('email'));
    }

    public function update_forget_password(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $email = $data['email'];
            //dd($data);
            $usercount = User::where('email', $email)->count();
            if ($usercount > 0) {
                ////////// Start Change Password
                $user = User::where('email', $email)->first();
                $rules = [
                    'password' => 'required',
                    'confirm_password' => 'required|same:password',
                    'g-recaptcha-response' => ['required', 'captcha']
                ];
                $messages = [
                    'password.required' => ' من فضلك ادخل كلمة المرور  ',
                    'confirm_password.required' => ' من فضلك اكد كلمة المرور ',
                    'confirm_password.same' => ' من فضلك يجب تاكيد كلمة المرور بنجاح ',
                    'g-recaptcha-response.required' => ' من فضلك حدد انك لست روبوت  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $user->update([
                    'password' => Hash::make($data['password']),
                ]);
                return redirect()->to('login')->with('Success_message', '   تم تعديل كلمة المرور بنجاح سجل ذخولك الان ');
            } else {
                return Redirect::back()->withErrors(['للاسف لا يوجد حساب بهذة البيانات ']);
            }
        }
    }







    public function logout()
    {
        Auth::logout();
        return Redirect()->route('index');
    }
}
