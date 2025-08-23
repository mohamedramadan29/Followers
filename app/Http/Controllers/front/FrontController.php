<?php

namespace App\Http\Controllers\front;

use App\Services\Api;
use App\Models\admin\Faq;
use App\Models\front\Order;
use App\Models\admin\Review;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\MainCategory;
use App\Models\admin\PublicSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    public function index(){
        $setting = PublicSetting::first();
        $bestservices = Product::with('Reviews','Provider','SubServices')->where('best_services',1)->orderBy('id','desc')->limit(8)->get();
        $newservices = Product::with('Reviews','Provider','SubServices')->where('newest_service',1)->orderBy('id','desc')->limit(8)->get();
        $categories = MainCategory::where('status',1)->get();
        $faqs = Faq::where('status',1)->get();
        $meta = [
            'title' => $setting->meta_title,
            'description' => $setting->meta_description,
            'keywords' => $setting->meta_keywords,
            'url' => $setting->meta_url,
        ];
        if(!Auth::check()){
            return view("front.index",compact('bestservices','categories','newservices','faqs','meta'));
        }
        else{
            $userOrders = Order::where('user_id', Auth::id())
        ->orderBy('id', 'desc')
        ->get();
        $orders_with_status = [];
        if(count($userOrders) > 0) {

        // إنشاء مفتاح الكاش بناءً على معرف المستخدم
        $cacheKey = 'user_orders_' . Auth::id();

        // جلب الطلبات من الكاش أو من قاعدة البيانات
        $orders_with_status = Cache::remember($cacheKey, 3600, function () {
            // استرجاع الطلبات مع بيانات المزود
            $orders = Order::with('provider')
                ->where('user_id', Auth::id())
                ->orderBy('id', 'desc')
                ->get();

            // إذا لم يكن هناك طلبات، إرجاع 404
            if ($orders->isEmpty()) {
                abort(404);
            }

            // إضافة بيانات الحالة من المزود
            $orders_with_status = $orders->map(function ($order) {
                try {
                    // التأكد من وجود بيانات المزود
                    if ($order->provider) {
                        $api = new Api($order->provider->api_url, $order->provider->api_key);
                        $provider_order_data = $api->status($order->order_number);
                        // إضافة جميع البيانات المسترجعة من المزود إلى الطلب
                        $order->provider_details = $provider_order_data;
                    } else {
                        $order->provider_details = null;
                    }
                } catch (\Exception $e) {
                    $order->provider_details = null; // في حالة حدوث خطأ
                }
                return $order;
            });

            return $orders_with_status;
        });
      }
        $meta = [
            'title' => 'طلباتي',
         ];
        }
        return view('front.users.orders.orders', compact('orders_with_status','userOrders','meta'));
    }
    public function category($url){
        $category = MainCategory::with('subCategories', 'products')
        ->where('meta_url', $url)
        ->orWhere('slug', $url)
        ->firstOrFail();
        $meta = [
            'title' => $category->meta_title,
            'description' => $category->meta_description,
            'keywords' => $category->meta_keywords,
            'url' => $category->meta_url,
        ];
        $reviews = Review::where('status',1)->where('published_date','<=',date('Y-m-d'))->
        inRandomOrder()->limit(8)->get();
        return view("front.category",compact('category','reviews','meta'));
    }
}
