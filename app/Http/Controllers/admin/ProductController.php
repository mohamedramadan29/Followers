<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\MainCategory;
use App\Models\admin\Product;
use App\Models\admin\Provider;
use App\Models\admin\SubCategory;
use App\Models\admin\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function index()
    {
        $products = Product::with('Main_Category', 'Sub_Category')->orderBy('id', 'desc')->get();
        $MainCategories = MainCategory::where('status', '1')->get();
        $SubCategories = SubCategory::where('status', '1')->get();
        $Provider = Provider::where('status', '1')->get();
        return view('admin.Products.index', compact('products', 'MainCategories', 'SubCategories', 'Provider'));
    }


    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('parent_id', $request->category_id)->pluck('name', 'id');
        if ($subCategories->isEmpty()) {
            return response()->json(['message' => 'لا يوجد أقسام فرعية داخل هذا القسم']);
        }

        return response()->json($subCategories);
    }

    public function store(Request $request)
    {
        $MainCategories = MainCategory::where('status', '1')->get();
        $SubCategories = SubCategory::where('status', '1')->get();
        $providers = Provider::where('status', '1')->get();
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                //  dd($data);
                $rules = [
                    'name' => 'required',
                    'category_id' => 'required',
                    'description' => 'required',
                    'provider_id' => 'required',
                    'status' => 'required',
                    'service_id' => 'required|integer',
                    'sub_category_id' => 'required',
                    'profit_percentage' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [
                    'name.required' => ' من فضلك ادخل اسم المنتج  ',
                    'category_id.required' => ' من فضلك حدد القسم الرئيسي للمنتج  ',
                    'description.required' => ' من فضلك ادخل الوصف الخاص بالمنتج ',
                    'image.mimes' =>
                        'من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
                    'image.image' => 'من فضلك ادخل الصورة بشكل صحيح',
                    'status.required' => ' من فضلك حدد حالة المنتج  ',
                    'service_id.required' => ' من فضلك ادخل رقم الخدمة  ',
                    'sub_category_id.required' => ' من فضلك حدد القسم الفرعي للمنتج  ',
                    'profit_percentage.required' => ' من فضلك ادخل نسبة الربح  ',
                    'provider_id.required' => ' من فضلك حدد المزود  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/product_images'));
                }
                /////// Check if This Product In Db Or Not
                ///
                $count_old_product = Product::where('name', $data['name'])->count();
                if ($count_old_product > 0) {
                    return Redirect::back()->withInput()->withErrors(' اسم المنتج متواجد من قبل من فضلك ادخل منتج جديد  ');
                }
                DB::beginTransaction();
                $product = new Product();
                $product->name = $data['name'];
                if ($data['slug'] && $data['slug'] != '') {
                    $slug = $this->CustomeSlug($data['slug']);
                } else {
                    $slug = $this->CustomeSlug($data['name']);
                }
                $product->slug = $slug;
                $product->category_id = $data['category_id'];
                $product->sub_category_id = $data['sub_category_id'];
                $product->provider_id = $data['provider_id'];
                $product->service_id = $data['service_id'];
                $product->status = $data['status'];
                $product->profit_percentage = $data['profit_percentage'];
                $product->description = $data['description'];
                $product->speed_active = isset($data['speed_active']) && $data['speed_active'] == 'on' ? 1 : 0;
                $product->speed_active_text = $data['speed_active_text'];
                $product->quality_status = isset($data['quality_status']) && $data['quality_status'] == 'on' ? 1 : 0;
                $product->quality_percentage = $data['quality_percentage'];
                $product->security = isset($data['security']) && $data['security'] == 'on' ? 1 : 0;
                $product->security_text = $data['security_text'];
                $product->start_time = isset($data['start_time']) && $data['start_time'] == 'on' ? 1 : 0;
                $product->start_time_text = $data['start_time_text'];
                $product->best_services = $data['best_services'];
                $product->newest_service = $data['newest_service'];
                $product->meta_title = $data['meta_title'];
                $product->meta_keywords = $data['meta_keywords'];
                $product->meta_description = $data['meta_description'];
                $product->image = $file_name;
                $product->save();

                ////////////////// Start Add Sub Service
                if (!empty($data['sub_services'])) {
                    foreach ($data['sub_services'] as $sub_serv) {
                        $sub_service = new SubService();
                        $sub_service->create([
                            'product_id' => $product->id,
                            'name' => $sub_serv['sub_serv_name'],
                            'provider_service_id' => $sub_serv['sub_serv_number'],
                        ]);
                    }
                }
                DB::commit();
                return $this->success_message(' تم اضافة الخدمة  بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('admin.products.add', compact('MainCategories', 'SubCategories', 'providers'));

    }

    public function update(Request $request, $slug)
    {
        // جلب الفئات الرئيسية والفرعية والعلامات التجارية والسمات
        $MainCategories = MainCategory::where('status', '1')->get();
        $SubCategories = SubCategory::where('status', '1')->get();
        $providers = Provider::where('status', '1')->get();

        // جلب المنتج مع الفئة الفرعية والمتغيرات المرتبطة به
        $product = Product::with('Sub_Category', 'SubServices')->where('slug', $slug)->first();

        if ($request->isMethod('post')) {
            // التحقق من صحة المدخلات
            $rules = [
                'name' => 'required',
                'category_id' => 'required',
                'description' => 'required',
                'provider_id' => 'required',
                'status' => 'required',
                'service_id' => 'required|integer',
                'sub_category_id' => 'required',
                'profit_percentage' => 'required',
            ];
            if ($request->hasFile('image')) {
                $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
            }
            $messages = [
                'name.required' => ' من فضلك ادخل اسم المنتج  ',
                'category_id.required' => ' من فضلك حدد القسم الرئيسي للمنتج  ',
                'description.required' => ' من فضلك ادخل الوصف الخاص بالمنتج ',
                'image.mimes' =>
                    'من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
                'image.image' => 'من فضلك ادخل الصورة بشكل صحيح',
                'status.required' => ' من فضلك حدد حالة المنتج  ',
                'service_id.required' => ' من فضلك ادخل رقم الخدمة  ',
                'sub_category_id.required' => ' من فضلك حدد القسم الفرعي للمنتج  ',
                'profit_percentage.required' => ' من فضلك ادخل نسبة الربح  ',
                'provider_id.required' => ' من فضلك حدد المزود  ',
            ];
            DB::beginTransaction();

            try {
                $data = $request->all();
                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/product_images'));
                    ////// / Delete Old Image
                    $old_image = public_path('assets/uploads/product_images/' . $product['image']);
                    if (file_exists($old_image)) {
                        @unlink($old_image);
                    }

                    $product->update([
                        'image' => $file_name,
                    ]);
                }
                // تحديث معلومات المنتج
                $product->name = $data['name'];
                if ($data['slug'] && $data['slug'] != '') {
                    $slug = $this->CustomeSlug($data['slug']);
                } else {
                    $slug = $this->CustomeSlug($data['name']);
                }
                $product->slug = $slug;
                $product->category_id = $data['category_id'];
                $product->sub_category_id = $data['sub_category_id'];
                $product->provider_id = $data['provider_id'];
                $product->service_id = $data['service_id'];
                $product->status = $data['status'];
                $product->profit_percentage = $data['profit_percentage'];
                $product->description = $data['description'];
                $product->speed_active = isset($data['speed_active']) && $data['speed_active'] == 'on' ? 1 : 0;
                $product->speed_active_text = $data['speed_active_text'];
                $product->quality_status = isset($data['quality_status']) && $data['quality_status'] == 'on' ? 1 : 0;
                $product->quality_percentage = $data['quality_percentage'];
                $product->security = isset($data['security']) && $data['security'] == 'on' ? 1 : 0;
                $product->security_text = $data['security_text'];
                $product->start_time = isset($data['start_time']) && $data['start_time'] == 'on' ? 1 : 0;
                $product->start_time_text = $data['start_time_text'];
                $product->best_services = $data['best_services'];
                $product->newest_service = $data['newest_service'];
                $product->meta_title = $data['meta_title'];
                $product->meta_keywords = $data['meta_keywords'];
                $product->meta_description = $data['meta_description'];
                $product->save();

                if (!empty($data['sub_services'])) {
                    $product->SubServices()->delete();
                    foreach ($data['sub_services'] as $sub_serv) {
                        $sub_service = new SubService();
                        $sub_service->create([
                            'product_id' => $product->id,
                            'name' => $sub_serv['sub_serv_name'],
                            'provider_service_id' => $sub_serv['sub_serv_number'],
                        ]);
                    }
                }
                DB::commit();
                // بعد تحديث المنتج بنجاح
                return Redirect::route('product.update', ['slug' => $product->slug])
                    ->with('Success_message', 'تم تعديل الخدمة  بنجاح');
            } catch (\Exception $e) {
                //  DB::rollback();
                return $this->exception_message($e);
            }
        }
        // عرض صفحة التعديل
        return view('admin.Products.update', compact('product', 'MainCategories', 'SubCategories', 'providers'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $this->success_message(' تم حذف المنتج بنجاح  ');
    }

    public function follow(Request $request)
    {
        try {
            $api_url = 'https://drd3m.me/api/v2';
            $api_key = 'eedc222172a35153a14e059bb50433fa';
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $api_key, // تأكد من أن المفتاح هنا هو نفسه الذي زودك به المزود
            ])->post($api_url, [
                        'action' => 'services',
                    ]);
            dd($response->body());
            //  dd($response);
            if ($response->successful()) {
                $data = $response->json();
                return response()->json($data);
            }
            //            else {
//                return back()->with('error', 'حدث خطأ في الاتصال بالمزود');
//            }
        } catch (\Exception $e) {
            return $e;
        }

    }
}
