<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\BlogCategory;
use App\Models\admin\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $categories = BlogCategory::all();
        return view('admin.BlogCategory.index', compact('categories'));
    }


    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'content' => 'required',
                    'image'=>'required|image'
                ];
                $messages = [
                    'name.required' => ' من فضلك ادخل الاسم   ',
                    'content.required' => ' من فضلك ادخل الوصف    ',
                    'image.required'=> ' من فضلك ادخل صورة القسم  '

                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }


                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/BlogCategory'));
                }
                $category = new BlogCategory();
                $category->create([
                    'name' => $data['name'],
                    'slug' => $this->CustomeSlug($data['name']),
                    'description' => $data['content'],
                    'image'=>$file_name
                ]);
                return $this->success_message(' تم اضافة القسم  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.BlogCategory.add');
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'name' => 'required',

                    'content' => 'required',
                ];
                $messages = [
                    'name.required' => ' من فضلك ادخل العنوان  ',
                    'content.required' => ' من فضلك ادخل الوصف    ',
                ];


                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/BlogCategory'));

                    ////// / Delete Old Image

                    $old_image = public_path('assets/uploads/BlogCategory/'.$category['image']);
                    if (file_exists($old_image)){
                        @unlink($old_image);
                    }
                    $category->update([
                        'image'=>$file_name,
                    ]);
                }

                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $category->update([
                    'name' => $data['name'],
                    'slug' => $this->CustomeSlug($data['name']),
                    'description' => $data['content'],
                ]);
                return $this->success_message(' تم تعديل القسم  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.BlogCategory.update', compact('category'));
    }

    public function delete($id)
    {
        $category = BlogCategory::findOrFail($id);
        $old_image = public_path('assets/uploads/BlogCategory/'.$category['image']);
        if (file_exists($old_image)){
            @unlink($old_image);
        }
        $category->delete();
        return $this->success_message(' تم حذف القسم ');
    }
}
