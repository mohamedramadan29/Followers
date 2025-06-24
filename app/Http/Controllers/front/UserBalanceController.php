<?php

namespace App\Http\Controllers\front;

use App\Models\front\User;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use Srmklive\PayPal\Facades\PayPal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\front\PaymentTransaction;
use App\Models\front\Transaction;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class UserBalanceController extends Controller
{
    use Message_Trait;
    protected $apiKey = 'ADCTNJS-XZ046AA-HDM04NW-BCATW23';
    public function index()
    {
        $transactions = Transaction::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.users.balance.index',compact('transactions'));
    }

    public function store(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'amount' => 'required|numeric|min:1',
                // 'payment_method' => 'required',
            ];
            $messages = [
                'amount.required' => ' من فضلك حدد المبلغ  ',
                'amount.numeric' => ' المبلغ يجب ان يكون رقم صحيح  ',
                'amount.min' => ' المبلغ يجب ان يكون اكبر من 1  ',
                // 'payment_method.required' => ' من فضلك حدد طريقة الدفع  ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect()->back()->withErrors($validator)->withInput();
            }
            $amount = $request->amount;
            return view('front.users.balance.payment-methods',compact('amount'));
            // if ($request->payment_method == 'crepto') {

            //     $endpoint = 'https://api.nowpayments.io/v1/invoice';
            //     $data = [
            //         "price_amount" => $request->amount, // المبلغ المدخل من العميل
            //         "price_currency" => "usd",
            //         "order_id" => uniqid(),
            //         "order_description" => "Payment for order #" . uniqid(),
            //         "ipn_callback_url" => route('crepto.payment.callback'),
            //         "success_url" => url('/payment/success'),
            //         "cancel_url" => url('/payment/cancel'),
            //     ];

            //     $response = Http::withHeaders([
            //         'x-api-key' => $this->apiKey,
            //     ])->post($endpoint, $data);

            //     $invoice = $response->json();

            //     if ($response->successful() && isset($invoice['invoice_url'])) {
            //         // تسجيل الفاتورة في قاعدة البيانات
            //         $paymenttransaction = new PaymentTransaction();
            //         PaymentTransaction::create([
            //             'user_id' => $user->id,
            //             'order_id' => $data['order_id'],
            //             'price_amount' => $data['price_amount'],
            //             'price_currency' => $data['price_currency'],
            //             'invoice_url' => $invoice['invoice_url'],
            //         ]);

            //         // توجيه العميل لبوابة الدفع
            //         return redirect($invoice['invoice_url']);
            //     } else {
            //         return back()->with('error', 'فشل إنشاء الفاتورة: ' . ($invoice['message'] ?? 'خطأ غير معروف'));
            //     }
            // } elseif ($request->payment_method == 'paypal') {
            //     $provider = PayPal::setProvider(); // إعداد مزود PayPal
            //     $provider->setApiCredentials(config('paypal'));
            //     $provider->setAccessToken($provider->getAccessToken());

            //     $orderId = uniqid();
            //     $response = $provider->createOrder([
            //         "intent" => "CAPTURE",
            //         "purchase_units" => [
            //             [
            //                 "reference_id" => $orderId,
            //                 "amount" => [
            //                     "currency_code" => "USD",
            //                     "value" => $request->amount,
            //                 ],
            //                 "description" => "Payment for order #{$orderId}",
            //             ],
            //         ],
            //         "application_context" => [
            //             "return_url" => route('paypal.success'),
            //             "cancel_url" => route('paypal.cancel'),
            //             "brand_name" => "Your Website Name", // اسم الموقع الخاص بك
            //             "landing_page" => "BILLING", // تفعيل صفحة الدفع بدون تسجيل الدخول
            //             "user_action" => "PAY_NOW", // زر "ادفع الآن"
            //         ],
            //     ]);

            //     if (isset($response['id'])) {
            //         PaymentTransaction::create([
            //             'user_id' => $user->id,
            //             'order_id' => $orderId,
            //             'price_amount' => $request->amount,
            //             'price_currency' => 'USD',
            //             'invoice_url' => $response['links'][1]['href'], // رابط الدفع
            //         ]);
            //         return redirect($response['links'][1]['href']); // إعادة توجيه العميل إلى PayPal
            //     } else {
            //         return back()->with('error', 'فشل إنشاء الفاتورة عبر PayPal');
            //     }
            // }

        }

    }

    // Callback to handle payment response  [ Crepto CallBack  ]
    public function handleCallback(Request $request)
    {
        $data = $request->all();
        // التحقق من البيانات الواردة
        $invoice = PaymentTransaction::where('order_id', $data['order_id'])->first();
        if (!$invoice) {
            return response()->json(['status' => 'error', 'message' => 'فاتورة غير موجودة']);
        }

        if ($data['payment_status'] === 'finished') {
            // تحديث حالة الفاتورة
            $invoice->status = 'paid';
            $invoice->save();

            // زيادة رصيد المستخدم
            $user = User::find($invoice->user_id);
            if ($user) {
                $user->balance += $invoice->price_amount;
                $user->save();
                // تسجيل العملية في السجل
                // UserStatment::create([
                //     'user_id' => $user->id,
                //     'transaction_type' => 'deposit',
                //     'amount' => $invoice->price_amount,
                // ]);
                // توجيه العميل إلى صفحة النجاح
                return redirect()->route('payment.success');
                // return response()->json(['status' => 'success', 'message' => 'تم شحن الرصيد بنجاح.']);
            }
        }
        // في حالة الفشل أو حالة غير معروفة
        $invoice->status = 'failed';
        $invoice->save();
        return redirect()->route('payment.cancel')->with('error', 'فشل الدفع. يرجى المحاولة مرة أخرى.');
    }

    // Success page
    public function paymentSuccess()
    {
        return view('front.payment.success');
    }

    // Cancel page
    public function paymentCancel()
    {
        return view('front.payment.cancel');
    }


    ##################################################################################### PAYPAL ####################################################################################


    public function paypalSuccess(Request $request)
    {
        $provider = PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        if ($response['status'] == 'COMPLETED') {
            $transaction = PaymentTransaction::where('order_id', $response['purchase_units'][0]['reference_id'])->first();
            if ($transaction) {
                $transaction->status = 'paid';
                $transaction->save();

                $user = User::find($transaction->user_id);
                if ($user) {
                    $user->balance += $transaction->price_amount;
                    $user->save();
                    return redirect()->route('payment.success')->with('success', 'تم الدفع بنجاح.');
                }
            }
        }
        return redirect()->route('payment.cancel')->with('error', 'فشل الدفع عبر PayPal.');
    }

    public function paypalCancel()
    {
        return redirect()->route('payment.cancel')->with('error', 'تم إلغاء الدفع.');
    }


}
