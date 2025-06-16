<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    use Message_Trait;

    public function index(){
        $pages = Page::orderBY('id','desc')->get();
        return view('admin.pages.index',compact('pages'));
    }
    public function store(Request $request){
        if($request->isMethod('post')){
            try{
                $data = $request->all();
                $rules = [
                    'title'=>'required|string',
                    'content'=>'required',
                ];
                $messages = [
                    'title.required'=>' من فضلك ادخل عنوان الصفحة  ',
                    'title.string'=>' من فضلك ادخل العنوان بشكل صحيح  ',
                    'content.required'=>' من فضلك ادخل محتوي الصفحة  ',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $page = new Page();
                $page->title = $data['title'];
                $page->content = $data['content'];
                $page->page_show = $data['page_show'];
                $page->status = 1;
                $page->save();
                return $this->success_message('تم اضافة الصفحة بنجاح');
            }catch(\Exception $e){
                return $this->exception_message($e);
            }
        }
        return view('admin.pages.store');
    }
    public function update(Request $request,$id){
        if($request->isMethod('post')){
            try{
                $data = $request->all();
                $rules = [
                    'title'=>'required|string',
                    'content'=>'required',
                ];
                $messages = [
                    'title.required'=>' من فضلك ادخل عنوان الصفحة  ',
                    'title.string'=>' من فضلك ادخل العنوان بشكل صحيح  ',
                    'content.required'=>' من فضلك ادخل محتوي الصفحة  ',
                ];
                $validator = Validator::make($data,$rules,$messages);
                if($validator->fails()){
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $page = Page::find($id);
                $page->title = $data['title'];
                $page->content = $data['content'];
                $page->page_show = $data['page_show'];
                $page->status = $data['status'];
                $page->save();
                return $this->success_message('تم تحديث الصفحة بنجاح');
            }catch(\Exception $e){
                return $this->exception_message($e);
            }
        }
        $page = Page::find($id);
        return view('admin.pages.update',compact('page'));
    }
    public function delete($id){
        try{
            $page = Page::find($id);
            $page->delete();
            return $this->success_message('تم حذف الصفحة بنجاح');
        }catch(\Exception $e){
            return $this->exception_message($e);
        }
    }
}
