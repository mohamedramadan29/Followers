<?php

namespace App\Http\Controllers\front\Payments;

use App\Models\front\User;
use Illuminate\Http\Request;
use App\Models\front\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalPaymentController extends Controller
{

    ################################################## Intial Payment Paypal ########################################
 // الخطوة 1: بدء الدفع
 public function initiatePayment(Request $request)
 {
     $data = $request->all();
     Session::put('PaypalPayment', [
         'price' => $data['amount'],
     ]);

     $provider = new PayPalClient;
     $provider->setApiCredentials(config('paypal'));
     $token = $provider->getAccessToken();
     $provider->setAccessToken($token);

     $order = $provider->createOrder([
         "intent" => "CAPTURE",
         "application_context" => [
             "return_url" => route('payment.paypal.success'),
             "cancel_url" => route('payment.paypal.cancel'),
         ],
         "purchase_units" => [
             [
                 "amount" => [
                     "currency_code" => "USD",
                     "value" => $data['amount']
                 ]
             ]
         ]
     ]);

     foreach ($order['links'] as $link) {
         if ($link['rel'] === 'approve') {
             return redirect()->away($link['href']);
         }
     }

     return redirect()->back()->with('error_message', 'فشل إنشاء الطلب.');
 }

 ############################################################ Paypal Card Payment ############################

 // الخطوة 1: بدء الدفع عبر البطاقات (MasterCard/Visa)
 public function initiateCardPayment(Request $request)
 {
     $data = $request->all();
     Session::put('CardPayment', [
         'price' => $data['amount'],
     ]);
     // إرجاع العرض الذي يحتوي على PayPal Smart Payment Buttons
     return view('front.users.balance.card-payment', ['amount' => $data['amount']]);
 }

 // الخطوة 2: بعد نجاح الدفع
 public function paypalSuccess(Request $request)
 {
     $provider = new PayPalClient;
     $provider->setApiCredentials(config('paypal'));
     $provider->getAccessToken();
     $response = $provider->capturePaymentOrder($request->token);
     if ($response['status'] === 'COMPLETED'){
         $planData = Session::get('PaypalPayment');
         $user = User::find(Auth::id());
         if (!$user) {
             return redirect()->route('profile')->with('error_message', 'الخطة غير متوفرة.');
         }
         $transaction = new Transaction();
         $transaction->user_id = Auth::user()->id;
         $transaction->payment_method = 'paypal';
         $transaction->payment_status = 'completed';
         $transaction->amount = $planData['price'];
         $transaction->payment_id = $response['id'];
         $transaction->save();

         ######### Start Add User Balance #########
         $user->balance += $planData['price'];
         $user->save();
         ######### End Add User Balance #########

         Session::forget('PaypalPayment');

         return redirect()->route('user.balance')->with('Success_message', 'تم شحن الرصيد بنجاح  .');
     }

     return redirect()->route('user.balance')->with('error_message', 'فشل الدفع.');
 }



public function cardSuccess(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();

    $orderID = $request->query('orderID'); // الحصول على orderID من الـ URL

    if (!$orderID) {
        return redirect()->route('user.balance')->with('error_message', 'معرف الطلب غير موجود.');
    }

    // التحقق من حالة الطلب
    $response = $provider->showOrderDetails($orderID);

    if (isset($response['status']) && $response['status'] === 'COMPLETED') {
        //$planData = Session::get('CardPayment'); // استخدام CardPayment بدلاً من PaypalPayment
        $user = User::find(Auth::id());

        if (!$user) {
            return redirect()->route('profile')->with('error_message', 'المستخدم غير موجود.');
        }

        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->payment_method = 'master'; // تحديد أن الدفع تم عبر البطاقة
        $transaction->payment_status = 'completed';
        $transaction->amount = $request->amount;
        $transaction->payment_id = $orderID; // استخدام orderID كمعرف الدفع
        $transaction->save();

        ######### Start Add User Balance #########
        $user->balance += $request->amount;
        $user->save();
        ######### End Add User Balance #########

        Session::forget('CardPayment');

        return redirect()->route('user.balance')->with('Success_message', 'تم شحن الرصيد بنجاح.');
    }

    return redirect()->route('user.balance')->with('error_message', 'فشل الدفع أو الطلب غير مكتمل.');
}
 // الخطوة 3: عند الإلغاء
 public function paypalCancel()
 {
     Session::forget('PaypalPayment');
     return redirect()->route('user.balance')->with('error_message', 'تم إلغاء الدفع.');
 }

 public function cardCancel()
 {
     Session::forget('CardPayment');
     return redirect()->route('user.balance')->with('error_message', 'تم إلغاء الدفع.');
 }
}
