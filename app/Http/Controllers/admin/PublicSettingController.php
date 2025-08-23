<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\PublicSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PublicSettingController extends Controller
{
    use Message_Trait;
    use Upload_Images;

    public function update(Request $request)
    {
        $public_setting = PublicSetting::first();
        if ($request->isMethod('post')) {
            $data = $request->all();
           // dd($data);
            $rules = [
                //'website_name' => 'required',

            ];
            if ($request->hasFile('image')) {
                $rules['image'] = 'image|mimes:jpg,png,jpeg,webp,svg';
            }
            if ($request->hasFile('favicon')) {
                $rules['favicon'] = 'image|mimes:jpg,png,jpeg,webp,svg';
            }
            $messages = [
                //'website_name.required' => 'من فضلك ادخل اسم الموقع',
                'image.image' => 'من فضلك ادخل صورة فقط',
                'image.mimes' => 'نوع الصورة فقط jpg, png, jpeg, webp,svg',
                'favicon.image'=>'من فضلك ادخل صورة فقط',
                'favicon.mimes'=>'نوع الصورة فقط jpg, png, jpeg, webp,svg'
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            // Handle image upload and deletion
            if ($request->hasFile('image')) {
                $old_image_path = public_path('assets/uploads/PublicSetting/' . $public_setting->website_logo);
                if (file_exists($old_image_path)) {
                    @unlink($old_image_path);
                }
                $file_name = $this->saveImage($request->image, public_path('assets/uploads/PublicSetting'));
             //   dd($file_name);
                $public_setting->website_logo = $file_name;
            }

            // Handle image upload and deletion
            if ($request->hasFile('favicon')) {
                $old_favicon_path = public_path('assets/uploads/PublicSetting/' . $public_setting->website_favicon);
                if (file_exists($old_favicon_path)) {
                    @unlink($old_favicon_path);
                }
                $favicon_name = $this->saveImage($request->favicon, public_path('assets/uploads/PublicSetting'));
             //   dd($file_name);
                $public_setting->website_favicon = $favicon_name;
            }

            // Update the fields with new values
            $public_setting->update([
              //  'website_name' => $data['website_name'],
                'about_website'=>$data['about_website'],
                'autentication_number'=>$data['autentication_number'],
                'commercial_number'=>$data['commercial_number'],
                'tax_number'=>$data['tax_number'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'facebook'=>$data['facebook'],
                'twitter'=>$data['twitter'],
                'instagram'=>$data['instagram'],
                'linkedin'=>$data['linkedin'],
                'youtube'=>$data['youtube'],
                'snapchap'=>$data['snapchap'],
                'pinterest'=>$data['pinterest'],
                'whatsapp'=>$data['whatsapp'],

            ]);
            return $this->success_message('تم تعديل الاعدادات العامة للموقع بنجاح');
        }

        return view('admin.PublicSetting.update', compact('public_setting'));
    }

    public function updateSeo(Request $request){
        $public_setting = PublicSetting::first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'website_name' => 'required',
            ];
            $messages = [
                'website_name.required' => 'من فضلك ادخل اسم الموقع',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            $public_setting->update([
                'website_name' => $data['website_name'],
                'website_description'=>$data['website_description'],
                'meta_keywords'=>$data['meta_keywords'],
            ]);
            return $this->success_message('تم تعديل الاعدادات العامة للموقع بنجاح');
        }
        return view('admin.PublicSetting.seo-data', compact('public_setting'));
    }
    public function updateRobots(Request $request){
        $public_setting = PublicSetting::first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'robots_txt' => 'required',
                'site_map_url'=>'required',
            ];
            $messages = [
                'robots_txt.required' => 'من فضلك ادخل محتوى ملف robots.txt',
                'site_map_url.required'=>'من فضلك ادخل محتوى ملف site map',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            $public_setting->update([
                'robots_txt' => $data['robots_txt'],
                'site_map_url'=>$data['site_map_url'],
            ]);
            return $this->success_message('تم تعديل ملف robots.txt بنجاح');
        }
        return view('admin.PublicSetting.robots-page', compact('public_setting'));
    }
}
