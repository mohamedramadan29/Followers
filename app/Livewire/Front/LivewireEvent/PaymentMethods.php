<?php

namespace App\Livewire\Front\LivewireEvent;

use App\Models\admin\PaymentCard;
use App\Models\front\Transaction;
use App\Models\front\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Parsecvpn\Heleket\HeleketSdk;

class PaymentMethods extends Component
{

    public $paymentMethod;
    public $amount;
    public $card_number = '';
    public $card_value = '';
    public function setPaymentMethod($method)
    {
        $this->paymentMethod = $method;
    }

    public function rules(){
        return [
            'paymentMethod' => 'required',
            'amount' => 'required',
           'card_number' => 'required_if:paymentMethod,card',
           'card_value' => 'required_if:paymentMethod,card|numeric|min:1',
        ];
    }

    public function messages(){
        return [
            'paymentMethod.required' => 'من فضلك حدد طريقة الدفع',
            'amount.required' => 'من فضلك حدد المبلغ',
            'card_number.required_if' => 'من فضلك حدد رقم البطاقة',
            'card_value.required_if' => 'من فضلك حدد قيمة البطاقة',
            'card_value.numeric' => 'من فضلك حدد قيمة البطاقة',
            'card_value.min' => 'من فضلك حدد قيمة البطاقة',
        ];
    }
    public function pay(){
        $this->validate($this->rules(), $this->messages());

        if($this->paymentMethod == 'master' || $this->paymentMethod == 'paypal' || $this->paymentMethod == 'usdt' || $this->paymentMethod == 'card'){
            $this->resetValidation();
            ########### Start Make Payment
        if($this->paymentMethod == 'master')
            {
                $this->dispatch('startPayment');
                 //dd('master');
                 // إعادة توجيه إلى صفحة الدفع مع خيارات البطاقات
               // return redirect()->route('payment.card.initiate', ['amount' => $this->amount]);
            }
            ########### End Make Payment
        if($this->paymentMethod == 'paypal'){
           return redirect()->route('payment.paypal.initiate', ['amount' => $this->amount]);
        }
        if($this->paymentMethod == 'card'){
            $this->cardNumberPayment();
        }
        if($this->paymentMethod == 'usdt'){
            try {
                // إنشاء مثيل من Heleket SDK
                $heleket = new HeleketSdk();

                // إنشاء رقم فاتورة فريد (يمكنك استخدام timestamp أو معرف الطلب)
                $invoiceId = 'INV-' . time();

                // إنشاء طلب دفع عبر Heleket
                $payment = $heleket->create_payment(
                    $invoiceId, // رقم الفاتورة
                    $this->amount, // المبلغ
                    'USDT', // العملة
                    'BTC', // الشبكة (Binance Smart Chain)
                    'bsc', // معرف الطلب
                    route('heleket.success'), // رابط النجاح
                    route('heleket.cancel'), // رابط الإلغاء
                    route('heleket.notify')
                );
              //  dd($payment);

                // التحقق من نجاح إنشاء الدفعة
                if (isset($payment)) {

                    // إعادة توجيه العميل إلى رابط الدفع
                    return redirect()->away($payment);
                } else {
                    // التعامل مع الخطأ
                    session()->flash('error', 'فشل إنشاء رابط الدفع. حاول مرة أخرى.');
                    return redirect()->back();
                }
            } catch (\Exception $e) {
                dd($e);
                // التعامل مع أي استثناءات
                session()->flash('error', 'حدث خطأ أثناء معالجة الدفع: ' . $e->getMessage());
                return redirect()->back();
            }
        }
    }
}

public function cardNumberPayment(){
    ###### Step1  Check Payment data Number and Value
    $card = PaymentCard::where('card_number',$this->card_number)->first();
    if(!$card){
        session()->flash('error_no_card',' رقم الكارت الذي ادخلتة غير صحيح  ');
        return;
    }
    if($card){
    $card_main_value = $card['balance'];
    if($card_main_value != $this->card_value){

        session()->flash('error_no_value',' قيمة الكارت التي ادخلتة غير صحيح  ');
        return;
    }

     ########### Step2 Check Card Number Useed Or Not
     $card_status = $card['status'];
     if($card_status != 1){
        session()->flash('error_no_card',' تم استخدام هذا الكارت من قبل من فضلك ادخل كارت جديد  ');
        return;
     }

      ######## Add Balance To User
      if(Auth::check()){
      $user = Auth::user()->id;
      $user = User::find($user);
      $user->balance += $card_main_value;
      $user->save();
      }

    ######### Change Card Status To Used
    $card->status = 0;
    $card->user_id = Auth::user()->id;
    $card->save();
    #########
    #### Add To Payment Transactions
    $transaction = new Transaction();
    $transaction->create([
        'user_id'=>Auth::user()->id,
        'payment_method'=>'card',
        'payment_status'=>'completed',
        'amount'=>$card_main_value,
    ]);

    session()->flash('card_success','تم شحن الكارت  بنجاح');
    return redirect()->route('user.balance');
    }
}


    public function render()
    {
        return view('front.livewire-event.payment-methods');
    }
}
