<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\GeneralNotification;
use App\Models\front\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $notifications = GeneralNotification::all();
        return view('admin.GeneralNotification.index', compact('notifications'));
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $message = $request->input('message');
            //   dd($message);
            $users = User::all();
            $notification = new GeneralNotification();
            $notification->message = $message;
            $notification->save();
            foreach ($users as $user) {
                $user->notify(new \App\Notifications\GeneralNotification($message));
            }
            return $this->success_message( 'تم ارسال الاشعار بنجاح');
        }
        return view('admin.GeneralNotification.store');
    }

    public function delete($id){
        $notification = GeneralNotification::find($id);
        $notification->delete();
        return $this->success_message('تم حذف الاشعار بنجاح');
    }
}
