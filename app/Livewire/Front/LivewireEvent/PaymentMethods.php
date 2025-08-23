<?php

namespace App\Livewire\Front\LivewireEvent;

use Livewire\Component;
use App\Models\front\User;
use App\Models\admin\HandPayment;
use App\Models\admin\PaymentCard;
use App\Models\front\Transaction;
use Parsecvpn\Heleket\HeleketSdk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Session\Session;

class PaymentMethods extends Component
{

    public $paymentMethod;
    public $amount;
    public $card_number;
    public $card_value;
    public $account_name;
    public $account_number;
    public $iban;


    public $select_bank;
    public $bank_name;
    public $banks;
    public function mount(){
        $this->banks = HandPayment::where('status',1)->get();
    }
    public function setPaymentMethod($method)
    {
        $this->paymentMethod = $method;
    }

    public function rules(){
        return [
            'paymentMethod' => 'required',
            'amount' => 'required',
            'card_number' => 'required_if:paymentMethod,card',
        ];
    }

    public function messages(){
        return [
            'paymentMethod.required' => 'من فضلك حدد طريقة الدفع',
            'amount.required' => 'من فضلك حدد المبلغ',
            'card_number.required_if' => 'من فضلك حدد رقم البطاقة',
        ];
    }
    public function pay(){
        $this->validate($this->rules(), $this->messages());

        if($this->paymentMethod == 'master' || $this->paymentMethod == 'paypal' || $this->paymentMethod == 'usdt' || $this->paymentMethod == 'card' || $this->paymentMethod == 'bank'){
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
        if($this->paymentMethod == 'bank'){
               ################ Add Bank PaymentTransaction ##############
        // الخطوة 5: إضافة المعاملة إلى سجل المعاملات
        Transaction::create([
            'user_id' => Auth::user()->id,
            'payment_method' => "bank" .'_'.$this->bank_name,
            'payment_status' => 'pending',
            'amount' => $this->amount,
        ]);
    // رسالة نجاح وإعادة توجيه
    session()->flash('card_success', ' شكرا لك تتم الان مراجعة الطلب من جانب الادارة  ');
    return redirect()->route('user.balance');
        }
    }
}


// تحديث قيمة البطاقة عند تغيير رقم البطاقة
public function updatedCardNumber($value)
{
    if (!empty($value)) {
        $card = PaymentCard::where('card_number', $value)->first();
        if ($card) {
            $this->card_value = $card->balance;
            session()->forget('error_no_card'); // إزالة رسالة الخطأ إذا وُجدت البطاقة
        } else {
            $this->card_value = null; // إعادة تعيين القيمة إذا لم توجد البطاقة
            session()->flash('error_no_card', 'رقم الكارت الذي أدخلته غير صحيح');
        }
    } else {
        $this->card_value = null; // إعادة تعيين القيمة إذا كان الحقل فارغًا
        session()->forget('error_no_card');
    }
}

public function cardNumberPayment()
{
    // الخطوة 1: التحقق من بيانات البطاقة (رقم البطاقة والقيمة)
    $card = PaymentCard::where('card_number', $this->card_number)->first();
    if (!$card) {
        session()->flash('error_no_card', 'رقم الكارت الذي أدخلته غير صحيح');
        return;
    }

    // الخطوة 2: التحقق من حالة البطاقة (تم استخدامها أم لا)
    $card_status = $card->status;
    if ($card_status != 1) {
        session()->flash('error_no_card', 'تم استخدام هذا الكارت من قبل، من فضلك أدخل كارت جديد');
        return;
    }

    // الخطوة 3: إضافة الرصيد للمستخدم
    if (Auth::check()) {
        $user = Auth::user()->id;
        $user = User::find($user);
        $user->balance += $card->balance;
        $user->save();
    }

    // الخطوة 4: تغيير حالة البطاقة إلى "مستخدمة"
    $card->status = 0;
    $card->user_id = Auth::user()->id;
    $card->save();

    // الخطوة 5: إضافة المعاملة إلى سجل المعاملات
    Transaction::create([
        'user_id' => Auth::user()->id,
        'payment_method' => 'card',
        'payment_status' => 'completed',
        'amount' => $card->balance,
    ]);

    // رسالة نجاح وإعادة توجيه
    session()->flash('card_success', 'تم شحن الكارت بنجاح');
    return redirect()->route('user.balance');
}

public function getBankDetails(){
    $bank = HandPayment::where('id', $this->select_bank)->first();
   // dd($bank);
   if($bank){
    $this->bank_name = $bank->name;
    $this->account_name = $bank->account_name;
    $this->account_number = $bank->account_number;
    $this->iban = $bank->iban;
   }
   else{
    $this->account_name = '';
    $this->account_number = '';
    $this->iban = '';
   }
}

    public function render()
    {
        return view('front.livewire-event.payment-methods');
    }
}
