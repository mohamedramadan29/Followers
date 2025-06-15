<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\LastNew;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LastNewsController extends Controller
{
    use Message_Trait;
    use Upload_Images;

    public function index()
    {
        $news = LastNew::orderBy('id', 'desc')->get();
        return view('admin.News.index', compact('news'));
    }

    ########################## Make Store ##########################
    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'publish_date' => 'required|date|after_or_equal:today',
            ];
            if ($request->hasFile('image')) {
                $rules['image'] = 'required|image|mimes:jpg,png,jpeg,webp';
            }
            $messages = [
                'title.required' => ' من فضلك ادخل العنوان',
                'content.required' => ' من فضلك ادخل المحتوى',
                'category.required' => ' من فضلك ادخل التصنيف',
                'publish_date.required' => ' من فضلك ادخل تاريخ النشر',
                'publish_date.date' => ' من فضلك ادخل تاريخ صحيح',
                'publish_date.after_or_equal' => ' من فضلك ادخل تاريخ صحيح',
                'image.required' => ' من فضلك ادخل الصورة',
                'image.mimes' => ' من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('image')) {
                $filename = $this->saveImage($request->file('image'), public_path('assets/uploads/News/'));
            }
            $news = new LastNew();
            $news->title = $request->title;
            $news->content = $request->content;
            $news->user_id = Auth::guard('admin')->user()->id;
            $news->status = 1;
            $news->category = $request->category;
            $news->publish_date = $request->publish_date;
            if ($request->hasFile('image')) {
                $news->image = $filename;
            }
            $news->save();
            return $this->success_message( ' تم اضافة الخبر بنجاح');
        }
        return view('admin.News.create');
    }

    ########################## Make Update #################################


    public function update(Request $request, $id)
    {
        $news = LastNew::find($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'publish_date' => 'required|date|after_or_equal:today',
            ];
            if ($request->hasFile('image')) {
                $rules['image'] = 'required|image|mimes:jpg,png,jpeg,webp';
            }
            $messages = [
                'title.required' => ' من فضلك ادخل العنوان',
                'content.required' => ' من فضلك ادخل المحتوى',
                'image.required' => ' من فضلك ادخل الصورة',
                'image.mimes' => ' من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('image')) {
                ############ Delete Old Image ############
                if ($news->image) {
                    $old_image = public_path('assets/uploads/News/' . $news->image);
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }

                }
                $filename = $this->saveImage($request->file('image'), public_path('assets/uploads/News/'));
                $news->image = $filename;
                $news->save();
            }
            $news->title = $request->title;
            $news->content = $request->content;
            $news->user_id = Auth::guard('admin')->user()->id;
            $news->category = $request->category;
            $news->publish_date = $request->publish_date;
            $news->save();
            return $this->success_message(' تم تعديل الخبر بنجاح');
        }
        return view('admin.News.update', compact('news'));
    }

    ################## Make Delete ###############################

    public function delete($id)
    {
        $news = LastNew::find($id);
        ########### Delete Old Image ############
        if ($news->image) {
            $old_image = public_path('assets/uploads/News/' . $news->image);
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
        }
        $news->delete();
        return $this->success_message( ' تم حذف الخبر بنجاح');
    }
}
