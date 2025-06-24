<?php

namespace App\Http\Controllers\front;

use App\Models\admin\Review;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use App\Models\front\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    use Message_Trait;
    public function store(Request $request,$order_id)
    {
        if ($request->isMethod('post')){
            try {
                $order = Order::find($order_id);
                if (!$order) {
                    return $this->error_message('الطلب غير موجود');
                }
                $data = $request->all();
                $rules = [
                    'rating'=>'required',
                    'content'=>'required',
                ];
                $messages = [
                    'rating.required'=>' من فضلك ادخل التقيم  ',
                    'content.required'=>' من فضلك ادخل التقيم  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                $review = new Review();
                $review->create([
                    'user_id'=>Auth::user()->id,
                    'name' => Auth::user()->name,
                    'description' => $data['content'],
                    'rate'=>$data['rating'],
                    'order_id'=>$order_id,
                    'product_id'=>$order->product_id,
                    'sub_service_id'=>$order->sub_service_id,
                    'status'=>0,
                ]);
                return $this->success_message(' تم اضافة التقيم بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('front.users.orders.orders');

    }


}
