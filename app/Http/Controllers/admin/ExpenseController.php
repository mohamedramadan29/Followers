<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Expense;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    use Message_Trait;
    public function index()
    {
        return view('admin.wallet.expense');
    }
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'amount' => 'required',
        ];
        $messages = [
            'title.required' => 'الاسم مطلوب',
            'amount.required' => 'المبلغ مطلوب',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $expense = new Expense();
        $expense->title = $data['title'];
        $expense->amount = $data['amount'];
        $expense->save();

        return $this->success_message(' تم اضافة المصروف بنجاح  ');
    }

    public function update(Request $request,$id){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'amount' => 'required',
        ];
        $messages = [
            'title.required' => 'الاسم مطلوب',
            'amount.required' => 'المبلغ مطلوب',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $expense = Expense::find($id);
        $expense->title = $data['title'];
        $expense->amount = $data['amount'];
        $expense->save();

        return $this->success_message(' تم تعديل المصروف بنجاح  ');
    }
    public function delete($id){
        $expense = Expense::find($id);
        $expense->delete();
        return $this->success_message(' تم حذف المصروف بنجاح  ');
    }
}
