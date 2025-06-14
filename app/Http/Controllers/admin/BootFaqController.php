<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\BootFaq;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BootFaqController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $faqs = BootFaq::all();
        return view('admin.BootFaqs.index', compact('faqs'));
    }


    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'title' => 'required',
                    'content' => 'required',
                    'keywords' => 'required',
                ];
                $messages = [
                    'title.required' => ' من فضلك ادخل السوال  ',
                    'content.required' => ' من فضلك ادخل الاجابة   ',
                    'keywords.required' => ' من فضلك ادخل الكلمات المفتاحية   ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $faq = new BootFaq();
                $faq->create([
                    'question' => $data['title'],
                    'answer' => $data['content'],
                    'keywords' => $data['keywords'],
                ]);
                return $this->success_message(' تم اضافة السوال بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.BootFaqs.add');
    }

    public function update(Request $request, $id)
    {
        $faq = BootFaq::findOrFail($id);
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'title' => 'required',
                    'content' => 'required',
                    'keywords' => 'required',
                ];
                $messages = [
                    'title.required' => ' من فضلك ادخل السوال  ',
                    'content.required' => ' من فضلك ادخل الاجابة   ',
                    'keywords.required' => ' من فضلك ادخل الكلمات المفتاحية   ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $faq->update([
                    'question' => $data['title'],
                    'answer' => $data['content'],
                    'keywords' => $data['keywords'],
                ]);
                return $this->success_message(' تم تعديل السوال بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.BootFaqs.update', compact('faq'));
    }

    public function delete($id)
    {
        $faq = BootFaq::findOrFail($id);
        $faq->delete();
        return $this->success_message(' تم حذف السوال   ');
    }

}
