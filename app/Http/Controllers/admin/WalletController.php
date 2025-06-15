<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Expense;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $expenses = Expense::orderBy('id','desc')->get();
        return view('admin.wallet.index',compact('expenses'));
    }
}
