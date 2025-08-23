<?php

namespace App\Http\Controllers\admin;

use App\Models\front\User;
use Illuminate\Http\Request;
use App\Models\admin\Expense;
use App\Models\front\Transaction;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $expenses = Expense::orderBy('id','desc')->get();
        return view('admin.wallet.index',compact('expenses'));
    }
    public function WalletPayments(){
       $transactions = Transaction::orderBy('id','desc')->get();
       $totalSuccessTransaction = Transaction::where('payment_status','completed')->get();
       $totalPendingTransaction = Transaction::where('payment_status','pending')->get();
       $totalFailedTransaction = Transaction::where('payment_status','failed')->get();
       $totalAmount = Transaction::sum('amount');
       $totalSuccessAmount = Transaction::where('payment_status','completed')->sum('amount');
       $totalPendingAmount = Transaction::where('payment_status','pending')->sum('amount');
       $totalFailedAmount = Transaction::where('payment_status','failed')->sum('amount');

        return view('admin.wallet.payments-data',compact('transactions','totalSuccessTransaction','totalPendingTransaction','totalFailedTransaction','totalAmount','totalSuccessAmount','totalPendingAmount','totalFailedAmount'));
    }
    public function PaymentShow($id){

    }
    public function PaymentActive($id){
        DB::beginTransaction();
        $transaction = Transaction::find($id);
        $transaction->payment_status = 'completed';
        $transaction->save();
        ######### Add Balance To User ##########
        $user = User::find($transaction->user_id);
        $user->balance += $transaction->amount;
        $user->save();
        DB::commit();
        return $this->success_message(' تم تفعيل الحوالة بنجاح واضافة الرصيد الي العميل  ');
    }
}
