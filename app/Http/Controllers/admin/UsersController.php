<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\UserStep;
use App\Models\front\User;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    use Message_Trait;
    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    public function show($id){
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    ######### Add Balance To User

    public function AddBalance(Request $request,$id){
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
        return $this->success_message(' تم اضافة  الرصيد بنجاح ');
    }

    ########### Delete Balance

    public function DeleteBalance(Request $request,$id){
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
        return $this->success_message(' تم خصم الرصيد بنجاح ');
    }

}
