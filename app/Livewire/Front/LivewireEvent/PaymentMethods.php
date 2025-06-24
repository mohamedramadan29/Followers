<?php

namespace App\Livewire\Front\LivewireEvent;

use Livewire\Component;

class PaymentMethods extends Component
{

    public $paymentMethod;
    public $amount;
    public function setPaymentMethod($method)
    {
        $this->paymentMethod = $method;
    }

    public function rules(){
        return [
            'paymentMethod' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages(){
        return [
            'paymentMethod.required' => 'من فضلك حدد طريقة الدفع',
            'amount.required' => 'من فضلك حدد المبلغ',
        ];
    }
    public function pay(){
        $this->validate($this->rules(), $this->messages());
        if($this->paymentMethod == 'master' || $this->paymentMethod == 'paypal' || $this->paymentMethod == 'usdt'){
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
        if($this->paymentMethod == 'usdt'){
          dd('usdt');
        }
    }
    }

    public function render()
    {
        return view('front.livewire-event.payment-methods');
    }
}
