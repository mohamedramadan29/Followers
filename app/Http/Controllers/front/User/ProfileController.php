<?php

namespace App\Http\Controllers\front\User;

use App\Models\front\User;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    public function index()
    {
        $user = Auth::user();
        return view("front.users.profile");
    }
    public function setting()
    {
        return view('front.users.setting');
    }

    public function orders()
    {
        return view('front.users.orders');
    }

    public function UpdateSetting(Request $request)
    {
        try {
            $user = User::where('id', Auth::id())->first();
            // dd($user);
            $data = $request->all();
            $rules = [
                'name' => 'required|string',
                'phone' => 'numeric|unique:users,phone,' . $user->id,
                'image' => 'image|mimes:jpg,png,jpeg,webp',
                'info' => 'string'
            ];
            $messages = [
                'name.required' => 'من فضلك، أدخل الاسم الخاص بك.',
                'name.string' => 'الاسم يجب أن يحتوي على حروف فقط. يرجى التأكد من صحة الإدخال.',
                'phone.numeric' => 'رقم الهاتف يجب أن يتكون من أرقام فقط. يرجى التحقق.',
                'phone.unique' => 'رقم الهاتف مُستخدم بالفعل. يُرجى اختيار رقم آخر.',
                'person_info.string' => 'النبذة يجب أن تكون نصًا فقط، يُرجى استخدام الحروف فقط.',
                'image.image' => 'الملف المُحدد يجب أن يكون صورة. يُرجى اختيار صورة صالحة.',
                'image.mimes' => 'نوع الصورة غير مدعوم. يُرجى اختيار صورة بصيغة: jpg, png, jpeg, أو webp.'
            ];

            if ($request->hasFile('image')) {
                /////// Delete Old User Image
                $old_image = public_path('assets/uploads/Users/' . $user->image);
                if (file_exists($old_image)) {
                    @unlink($old_image);
                }
                $filename = $this->saveImage($request->file('image'), public_path('assets/uploads/Users/'));
                $user->image = $filename;
                $user->save();
            }
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect()->back()->withInput()->withErrors($validator);
            }
            $user->name = $data['name'];
            $user->phone = $data['phone'];
            $user->person_info = $data['person_info'];
            $user->save();

            return $this->success_message(' تم تعديل البيانات بنجاح  ');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }

    public function UpdatePassword(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'old_password' => 'required',
                    'new_password' => 'required|min:8',
                    'confirm_password' => 'required|same:new_password'
                ];
                $messages = [
                    'old_password.required' => ' من فضلك ادخل كلمة المرور القديمة ',
                    'new_password.min' => ' من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',
                    'confirm_password.same' => 'من فضلك اكد كلمة المرور بشكل صحيح ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if (Hash::check($data['old_password'], Auth::user()->password)) {
                    $user = User::where('id', Auth::user()->id)->first();
                    $user->update([
                        'password' => Hash::make($data['new_password'])
                    ]);
                    return $this->success_message(' رائع !! تم تعديل كلمة المرور بنجاح  ');
                } else {
                    return Redirect::back()->withInput()->withErrors(['  كلمة المرور القديمة غير صحيحة !!!!!  ']);
                }
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('website.users.change-password');
    }

    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return $this->success_message('تمت قراءة جميع الإشعارات');
    }

    public function alerts(){
        $notifications = Auth::user()->notifications;
        $unreadNotifications = Auth::user()->unreadNotifications;
        return view('front.users.alerts',compact('notifications','unreadNotifications'));
    }
    public function alertsUnread(){
        $notifications = Auth::user()->notifications;
        $unreadNotifications = Auth::user()->unreadNotifications;
        return view('front.users.alerts',compact('notifications','unreadNotifications'));
    }


}
