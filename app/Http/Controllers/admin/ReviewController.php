<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Product;
use App\Models\admin\Review;
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
        if ($request->isMethod('post')){
            try {
                $data = $request->all();

                // dd($data);
                $rules = [
                    'rating'=>'required',
                    'name'=>'required',
                    'content'=>'required'
                ];
                $messages = [
                    'rating.required'=>' من فضلك ادخل التقيم  ',
                    'name.required'=>' من فضلك ادخل الاسم   ',
                    'content.required'=>' من فضلك ادخل التقيم  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                $review = new Review();
                $review->create([
                    'user_id'=>Auth::guard('admin')->id(),
                    'name' => $data['name'],
                    'description' => $data['content'],
                    'rating'=>$data['rating'],
                    'service_id'=>$data['service_id'],
                    'status'=>$data['status'],
                ]);

                return $this->success_message(' تم اضافة التقيم بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('admin.Reviews.add',compact('products'));

    }


    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $products = Product::all();
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
                    'user_id'=>Auth::guard('admin')->id(),
                    'name' => $data['name'],
                    'description' => $data['content'],
                    'rating'=>$data['rating'],
                    'service_id'=>$data['service_id'],
                    'status'=>$data['status'],
                ]);

                return $this->success_message(' تم تعديل  التقيم بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('admin.Reviews.update',compact('review','products'));

    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return $this->success_message(' تم حذف التقيم بنجاح  ');
    }

}
