<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TermsController extends Controller
{
    use Message_Trait;

    public function Terms(Request $request)
    {
        $terms = Term::where('page_title', 'الشروط والاحكام')->first();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'content' => 'required'
                ];
                $messages = [
                    'content.required' => ' من فضلك ادخل محتوي الصفحة  '
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect()->back()->withInput()->withErrors($validator);
                }
                $terms->update([
                    'content' => $data['content']
                ]);
                return $this->success_message(' تم تعديل محتوي الصفحة بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('admin.Terms.terms', compact('terms'));
    }


    #################################################### ReturnPolicy ############################
    public function ReturnPolicy(Request $request)
    {
        $terms = Term::where('page_title', 'سياسة الاستبدال و الاسترجاع')->first();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'content' => 'required'
                ];
                $messages = [
                    'content.required' => ' من فضلك ادخل محتوي الصفحة  '
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect()->back()->withInput()->withErrors($validator);
                }
                $terms->update([
                    'content' => $data['content']
                ]);
                return $this->success_message(' تم تعديل محتوي الصفحة بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('admin.Terms.return', compact('terms'));
    }

    ############################################### Privacy Policy ######################

    public function PrivacyPolicy(Request $request)
    {
        $terms = Term::where('page_title', 'سياسة الاستخدام والخصوصية')->first();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'content' => 'required'
                ];
                $messages = [
                    'content.required' => ' من فضلك ادخل محتوي الصفحة  '
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect()->back()->withInput()->withErrors($validator);
                }
                $terms->update([
                    'content' => $data['content']
                ]);
                return $this->success_message(' تم تعديل محتوي الصفحة بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('admin.Terms.privacy', compact('terms'));
    }
}
