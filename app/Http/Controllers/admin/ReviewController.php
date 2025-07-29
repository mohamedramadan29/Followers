<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Product;
use App\Models\admin\Review;
use App\Models\front\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $reviews = Review::with('service')->get();
        return view('admin.Reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $products = Product::all();
        $users = User::all();
        if ($request->isMethod('post')){
            try {
                $data = $request->all();
                $user = User::find($data['user_id']);
                $user_name = $user['name'];
                 //dd($data);
                $rules = [
                    'rating'=>'required',
                    'user_id'=>'required',

                    'content'=>'required',
                    'published_date'=>'required|date|after_or_equal:today',
                    'status'=>'required|in:0,1',
                ];
                $messages = [
                    'rating.required'=>' من فضلك ادخل التقيم  ',
                    'user_id.required'=>' من فضلك حدد المستخدم  ',
                    'content.required'=>' من فضلك ادخل التقيم  ',
                    'published_date.required'=>' من فضلك ادخل تاريخ النشر  ',
                    'published_date.date'=>' من فضلك ادخل تاريخ صحيح  ',
                    'published_date.after_or_equal'=>' من فضلك ادخل تاريخ صحيح  ',
                    'status.required'=>' من فضلك ادخل حالة التقيم  ',
                    'status.in'=>' من فضلك ادخل حالة صحيح  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                $review = new Review();
                $review->create([
                    'user_id'=>$data['user_id'],
                    'name' => $user_name,
                    'description' => $data['content'],
                    'rate'=>$data['rating'],
                    'product_id'=>$data['service_id'],
                    'published_date'=>$data['published_date'],
                    'status'=>$data['status'],
                ]);

                return $this->success_message(' تم اضافة التقيم بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('admin.Reviews.add',compact('products','users'));

    }


    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $products = Product::all();
        $users = User::all();
        if ($request->isMethod('post')){
            try {
                $data = $request->all();

                $rules = [];
                $messages = [];

                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $review->update([
                    'user_id'=>$data['user_id'],
                    'description' => $data['content'],
                    'rate'=>$data['rating'],
                    'product_id'=>$data['service_id'],
                    'published_date'=>$data['published_date'],
                    'status'=>$data['status'],
                ]);

                return $this->success_message(' تم تعديل  التقيم بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('admin.Reviews.update',compact('review','products','users'));

    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return $this->success_message(' تم حذف التقيم بنجاح  ');
    }

    public function status($id)
    {
        $review = Review::findOrFail($id);
        $review->update([
            'status'=> $review->status == 1 ? 0 : 1,
        ]);
        return $this->success_message(' تم تعديل حالة التقيم بنجاح  ');
    }
}
