<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\PaymentCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentCardsController extends Controller
{
    use Message_Trait;
    public function index(){
        $cards = PaymentCard::orderBy('id','desc')->get();
        return view('admin.wallet.payment-methods.payment-cards.index',compact('cards'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){
            try{

                $data = $request->all();
                $rules = [
                    'balance'=>'required|numeric',
                    'card_number'=>'required|unique:payment_cards,card_number',
                ];
                $messages = [
                    'balance.required'=>'الرصيد مطلوب',
                    'balance.numeric'=>'الرصيد يجب أن يكون رقم',
                    'card_number.required'=>'رقم البطاقة مطلوب',
                    'card_number.unique'=>'رقم البطاقة موجود بالفعل',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                    return $this->error_message($validator->errors()->first());
                }
                $card = new PaymentCard();
                $card->balance = $data['balance'];
                $card->card_number = $data['card_number'];
                $card->current_balance =  $data['balance'];
                $card->save();
                return $this->success_message(' تم اضافة البطاقة بنجاح  ');
            }catch(\Exception $e){
                return $this->exception_message($e);
            }
        }
    }

    public function update(Request $request,$id){
        if($request->isMethod('post')){
            try{
                $data = $request->all();
                $rules = [
                    'balance'=>'required|numeric',
                    'card_number'=>'required|unique:payment_cards,card_number,'.$id,
                ];
                $messages = [
                    'balance.required'=>'الرصيد مطلوب',
                    'balance.numeric'=>'الرصيد يجب أن يكون رقم',
                    'card_number.required'=>'رقم البطاقة مطلوب',
                    'card_number.unique'=>'رقم البطاقة موجود بالفعل',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                    return $this->error_message($validator->errors()->first());
                }
                $card = PaymentCard::find($id);
                $card->balance = $data['balance'];
                $card->card_number = $data['card_number'];
                $card->current_balance =  $data['balance'];
                $card->save();
                return $this->success_message(' تم تحديث البطاقة بنجاح  ');
            }catch(\Exception $e){
                return $this->exception_message($e);
            }
        }
    }

    public function delete($id){
        try{
            $card = PaymentCard::find($id);
            $card->delete();
            return $this->success_message(' تم حذف البطاقة بنجاح  ');
        }catch(\Exception $e){
            return $this->exception_message($e);
        }
    }
}
