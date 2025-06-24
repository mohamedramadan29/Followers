<?php

namespace App\Http\Controllers\front;

use App\Services\Api;
use App\Models\front\User;
use App\Models\front\Order;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Provider;
use App\Models\admin\SubService;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    use Message_Trait;

    public function store(Request $request)
    {
        $data = $request->all();
      //  dd($data);
        if($data['service_type']=='sub'){
            $service = SubService::where('id', $data['website_serv_id'])->first();
            $profit_percentage = $service->profit_percentage;
            $service_name = $service['name'];
        }else{
            $service = Product::where('id', $data['website_serv_id'])->first();
            $profit_percentage = $service->profit_percentage;
            $service_name = $service['name'];
        }
        $rules = [
            'provider_id' => 'required',
            'main_service' => 'required',
            'followers_num' => 'required',
            'account_link' => 'required|url',
            'final_price' => 'required|numeric',
        ];
        $messages = [
            'provider_id.required' => ' هناك خلل ما من فضلك تواصل مع الادارة  ',
            'main_service.required' => ' هناك خلل ما من فضلك تواصل مع الادارة   ',
            'followers_num.required' => ' من فضلك حدد العدد  ',
            'account_link.required' => ' من فضلك ادخل رابط الحساب  ',
            'account_link.url' => ' من فضلك ادخل رابط كامل بشكل صحيح  ',
            'final_price.required' => ' من فضلك ادخل سعر الخدمة  ',
            // 'final_price.min' => ' سعر الخدمة يجب ان يكون اكبر من 0.1  ',
            'final_price.numeric' => ' سعر الخدمة يجب ان يكون رقم  ',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $provider = Provider::where('id', $data['provider_id'])->first();
        if (!$provider) {
            return Redirect()->back()->withInput()->withErrors(' هناك خلل ما من فضلك تواصل مع الادارة  ');
        }
        if(!Auth::check()){
             return to_route('login');
        }
        $user = User::find(Auth::id());
        $user_balance = $user->balance;
        if ($user_balance < $data['final_price']) {
            return Redirect()->back()->withInput()->withErrors('  لا يوجد رصيد كافي لشراء الخدمة !! اشحن رصيدك اولا   ');
        }
        DB::beginTransaction();
        try {
            ######################################### إرسال الطلب للمزود #########################################
            $api = new Api($provider->api_url, $provider->api_key);
            // إعداد بيانات الطلب
            $orderData = [
                'service' => $data['main_service'],
                'link' => $data['account_link'],
                'quantity' => $data['followers_num'],
            ];
           // dd($orderData);
            // إرسال الطلب والحصول على الاستجابة
            $provider_response = $api->order($orderData);
            $provider_order_id = $provider_response->order ?? null;
            if (!$provider_order_id) {
                return Redirect::back()->withInput()->withErrors(' هناك خلل ما من فضلك تواصل مع الادارة  ');
            }
            ######################################## تخزين الطلب في قاعدة البيانات ########################################
            $order = new Order();
            $order->order_number = $provider_order_id; // تخزين رقم الطلب من المزود
            $order->user_id = Auth::id();
            $order->service_type = $data['service_type'];
            $order->provider_id = $data['provider_id'];
            $order->main_service_id = $data['main_service'];
            $order->product_id = $data['product_id'];
            $order->sub_service_id = $data['sub_service_id'] ?? null;
            $order->name = $service_name;
            $order->quantity = $data['followers_num'];
            $order->page_link = $data['account_link'];
            $order->provider_main_price = number_format($data['provider_final_price'], 4);
            $order->profit_percentage = $profit_percentage;
            $order->total_price = number_format($data['final_price'], 4);
            $order->order_status = 1; // يمكنك تحديد الحالة المناسبة
            $order->status = 'pending';
            $order->start_time = now();
            $order->refill = $data['service_refill'];
            $order->cancel = $data['service_cancel'];
            $order->save();
            //////////////////////////////// تحديث رصيد المستخدم #############################
            $user->balance -= $data['final_price'];
            $user->save();
            // تأكيد العملية
            DB::commit();
            // استجابة النجاح
            return $this->success_message('تم شراء الخدمة بنجاح، رقم الطلب: ' . $provider_order_id, $order);
        } catch (\Exception $e) {
            // إلغاء العملية عند حدوث خطأ
            DB::rollback();
            return $this->exception_message($e);
        }
    }
}
