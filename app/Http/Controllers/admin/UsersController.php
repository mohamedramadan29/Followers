<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\UserStep;
use App\Models\front\User;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\front\Order;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    ########### Store New User

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'password' => 'required',
                'sex' => 'required',
                'city' => 'required',
                'birthday' => 'required',
            ];
            $customMessages = [
                'name.required' => 'الاسم مطلوب',
                'phone.required' => 'رقم الهاتف مطلوب',
                'email.required' => 'البريد الالكتروني مطلوب',
                'password.required' => 'كلمة المرور مطلوبة',
                'sex.required' => 'الجنس مطلوب',
                'city.required' => 'المدينة مطلوبة',
                'birthday.required' => 'تاريخ الميلاد مطلوب',
            ];
            //  dd($data);
            $validator = Validator::make($data, $rules, $customMessages);
            if ($validator->fails()) {
                return $this->error_message($validator->errors()->first());
            }
            $user = User::create(
                [
                    'name' => $data['name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'sex' => $data['sex'],
                    'city' => $data['city'],
                    'birthday' => $data['birthday'],
                    'account_status' => 1,
                    'birthday' => $data['birthday'],

                ]
            );
            return $this->success_message('تم اضافة المستخدم بنجاح');
        }
        return view('admin.users.store');
    }
    public function show($id)
    {
        $user = User::find($id);
        $orders = Order::where('user_id', '=', $id)->get();
        return view('admin.users.show', compact('user', 'orders'));
    }
    ######### Add Balance To User

    public function AddBalance(Request $request, $id)
    {
        $user = User::find($id);
        DB::beginTransaction();
        $user->balance += $request->balance;
        $user->save();
        ######### Add Step To User
        $step = new UserStep();
        $step->user_id = $user->id;
        $step->amount = $request->balance;
        $step->strep_title = ' اضافة رصيد من جانب الادمن  ';
        $step->save();
        DB::commit();
        return $this->success_message(' تم اضافة رصيد بقيمة ' . $request->balance . ' ريال الي المستخدم بنجاح ');
    }

    ########### Delete Balance

    public function DeleteBalance(Request $request, $id)
    {
        $user = User::find($id);
        DB::beginTransaction();
        $user->balance -= $request->balance;
        $user->save();
        ######### Add Step To User
        $step = new UserStep();
        $step->user_id = $user->id;
        $step->amount = $request->balance;
        $step->strep_title = ' خصم رصيد من جانب الادمن  ';
        $step->save();
        DB::commit();
        return $this->success_message(' تم خصم رصيد بقيمة ' . $request->balance . ' ريال من المستخدم بنجاح ');
    }

    ########### Ban User

    public function Ban(Request $request, $id)
    {

        $user = User::find($id);
        $user->block_status = 1;
        $user->save();
        return $this->success_message(' تم حظر المستخدم بنجاح ');
    }

    ########### Unban User

    public function Unban($id)
    {
        $user = User::find($id);
        $user->block_status = 0;
        $user->save();
        return $this->success_message(' تم رفع حظر المستخدم بنجاح ');
    }
}
