<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\HandPayment;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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
                    'account_name'=>'required',
                    'account_number'=>'required|unique:hand_payments,account_number,'.$request->id,
                    'iban'=>'required|unique:hand_payments,iban,'.$request->id,
                ];
                $messages = [
                    'name.required'=>'الاسم مطلوب',
                    'description.required'=>'الوصف مطلوب',
                    'account_name.required'=>'صاحب الحساب مطلوب',
                    'account_number.required'=>'رقم الحساب مطلوب',
                    'iban.required'=>'الايبان مطلوب',
                    'account_number.unique'=>'رقم الحساب موجود بالفعل',
                    'iban.unique'=>'الايبان موجود بالفعل',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                  return Redirect::back()->withInput()->withErrors($validator);
                }
                $handPayment = new HandPayment();
                $handPayment->name = $data['name'];
                $handPayment->account_name = $data['account_name'];
                $handPayment->account_number = $data['account_number'];
                $handPayment->iban = $data['iban'];
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
                    'account_name'=>'required',
                    'account_number'=>'required|unique:hand_payments,account_number,'.$request->id,
                    'iban'=>'required|unique:hand_payments,iban,'.$request->id,
                ];
                $messages = [
                    'name.required'=>'الاسم مطلوب',
                    'description.required'=>'الوصف مطلوب',
                    'account_name.required'=>'صاحب الحساب مطلوب',
                    'account_number.required'=>'رقم الحساب مطلوب',
                    'iban.required'=>'الايبان مطلوب',
                    'account_number.unique'=>'رقم الحساب موجود بالفعل',
                    'iban.unique'=>'الايبان موجود بالفعل',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $handPayment = HandPayment::find($id);
                $handPayment->name = $data['name'];
                $handPayment->account_name = $data['account_name'];
                $handPayment->account_number = $data['account_number'];
                $handPayment->iban = $data['iban'];
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
