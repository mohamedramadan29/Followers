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
        $meta = [
            'title' => 'رصيدي',
        ];
        $transactions = Transaction::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.users.balance.index',compact('transactions','meta'));
    }

    public function store(Request $request)
    {
        $meta = [
            'title' => '  وسائل الدفع  ',
        ];
        $user = User::where('id', Auth::id())->first();
        $request = $request->only('amount');
        $amount = $request['amount'];
            return view('front.users.balance.payment-methods',compact('amount','meta'));


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
