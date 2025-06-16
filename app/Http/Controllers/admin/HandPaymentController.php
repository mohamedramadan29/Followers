<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\HandPayment;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HandPaymentController extends Controller
{
    use Message_Trait;

    public function index(){
        $handPayments = HandPayment::orderBy('id','desc')->get();
        return view('admin.wallet.payment-methods.payment-hands.index',compact('handPayments'));
    }


    public function store(Request $request){
        if($request->isMethod('post')){
            try{
                $data = $request->all();
                $rules = [
                    'name'=>'required',
                    'description'=>'required',
                ];
                $messages = [
                    'name.required'=>'الاسم مطلوب',
                    'description.required'=>'الوصف مطلوب',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                    return $this->error_message($validator->errors()->first());
                }
                $handPayment = new HandPayment();
                $handPayment->name = $data['name'];
                $handPayment->description = $data['description'];
                $handPayment->save();
                return $this->success_message(' تم اضافة البطاقة بنجاح  ');
            }catch(\Exception $e){
                return $this->exception_message($e);
            }
        }
        return view('admin.wallet.payment-methods.payment-hands.store');
    }

    public function update(Request $request,$id){
        if($request->isMethod('post')){
            try{
                $data = $request->all();
                $rules = [
                    'name'=>'required',
                    'description'=>'required',
                ];
                $messages = [
                    'name.required'=>'الاسم مطلوب',
                    'description.required'=>'الوصف مطلوب',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                    return $this->error_message($validator->errors()->first());
                }
                $handPayment = HandPayment::find($id);
                $handPayment->name = $data['name'];
                $handPayment->description = $data['description'];
                $handPayment->save();
                return $this->success_message(' تم تحديث البطاقة بنجاح  ');
            }catch(\Exception $e){
                return $this->exception_message($e);
            }
        }
        $payment = HandPayment::findOrFail($id);
        return view('admin.wallet.payment-methods.payment-hands.edit',compact('payment'));
    }

    public function delete($id){
        try{
            $handPayment = HandPayment::find($id);
            $handPayment->delete();
            return $this->success_message(' تم حذف البطاقة بنجاح  ');
        }catch(\Exception $e){
            return $this->exception_message($e);
        }
    }
}
