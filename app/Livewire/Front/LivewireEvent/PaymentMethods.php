<?php

namespace App\Livewire\Front\LivewireEvent;

use Livewire\Component;
use Parsecvpn\Heleket\HeleketSdk;

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

    public function render()
    {
        return view('front.livewire-event.payment-methods');
    }
}
