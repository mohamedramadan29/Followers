<?php

namespace App\Http\Controllers\front;

use App\Services\Api;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\Provider;
use App\Http\Controllers\Controller;
use App\Models\admin\SubService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{

    public function index($url)
    {
        $service = Product::with('Main_Category', 'SubServices')->where('meta_url', $url)->orWhere('slug', $url)->firstOrFail();

        $samservices = Product::where('category_id', $service['category_id'])->where('status', '1')->where('id', '!=', $service['id'])->get();
        $service_id = $service['service_id'];
        $provider_id = $service['provider_id'];
        $provider = Provider::where('id', $provider_id)->firstOrFail();
        $cacheKey = "provider_service_{$provider_id}_{$service_id}";
        ######################### Get Service Details From Provider #####################################
        // $api = new Api($provider->api_url, $provider->api_key);
        // $services = $api->services();
        // $service_from_provider = collect($services)->firstWhere('service', $service_id);

        // استخدام الكاش لجلب البيانات
        $service_from_provider = Cache::remember($cacheKey, 3600, function () use ($provider, $service_id) {
            $api = new Api($provider->api_url, $provider->api_key);
            $services = $api->services();
            return collect($services)->firstWhere('service', $service_id);
        });
        if ($service_from_provider) {
            //dd($service_from_provider);
            // سعر الخدمة الأساسي
            $rate = $service_from_provider->rate;
            $rate_for_one = $rate / 1000; // السعر لكل وحدة
            $min = $service_from_provider->min;   // الحد الأدنى
            // حساب التكلفة الإجمالية للحد الأدنى
            $base_price = $rate_for_one * $min;
            // نسبة الربح
            $profit_percentage = $service->profit_percentage; // يمكنك تغييرها حسب احتياجك
            // إضافة نسبة الربح
            $final_price = $base_price + ($base_price * $profit_percentage / 100);
            //   dd($final_price);
            // تحويل البيانات إلى العرض
            $service_from_provider->base_price = $base_price;
            $service_from_provider->final_price = $final_price;
        } else {
            abort(404);
        }
        //dd($service_from_provider);
        #######################################################################################################
        $meta = [
            'title' => $service->meta_title,
            'description' => $service->meta_description,
            'keywords' => $service->meta_keywords,
            'url' => $service->meta_url,
        ];
        return view("front.product", compact('service', 'service_from_provider', 'samservices','meta'));
    }
    public function getSubServiceDetails($product_id, $provider_service_id)
    {
        // جلب الخدمة الرئيسية
        $mainService = Product::find($product_id);
        if (!$mainService) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $provider = Provider::find($mainService->provider_id);
        if (!$provider) {
            return response()->json(['error' => 'Provider not found'], 404);
        }

        // جلب الخدمة الفرعية المخزنة محليًا
        $subService = SubService::where('product_id', $product_id)
            ->where('provider_service_id', $provider_service_id)
            ->first();
        if (!$subService) {
            return response()->json(['error' => 'SubService not found'], 404);
        }
        ######## If SubService Is The Main Service


        // مفتاح الكاش
        $cacheKey = "provider_service_{$provider->id}_{$provider_service_id}";

        // جلب بيانات الخدمة من مزود الخدمة باستخدام الكاش
        $serviceFromProvider = Cache::remember($cacheKey, 3600, function () use ($provider, $provider_service_id) {
            $api = new Api($provider->api_url, $provider->api_key);
            $services = $api->services();
            return collect($services)->firstWhere('service', $provider_service_id);
        });

        // dd($serviceFromProvider);

        if (!$serviceFromProvider) {
            return response()->json(['error' => 'Service details not found from provider'], 404);
        }
        // حساب السعر النهائي
        $rate = $serviceFromProvider->rate; // السعر لكل وحدة
        $min = $serviceFromProvider->min;   // الحد الأدنى
        $max = $serviceFromProvider->max;   // الحد الأقصى
        $rate_for_one = $rate / 1000;
        $basePrice = $rate_for_one * $min; // التكلفة الأساسية
        $profitPercentage = $mainService->profit_percentage; // نسبة الربح

        $finalPrice = $basePrice + ($basePrice * $profitPercentage / 100);
        $service_refill = $serviceFromProvider->refill;
        $service_cancel = $serviceFromProvider->cancel;

        // دمج البيانات المحلية مع بيانات المزود
        $response = [
            'min' => $min,
            'max' => $max,
            'rate' => $rate,
            'base_price' => number_format($basePrice, 4),
            'final_price' => number_format($finalPrice,4 ),
            'service_refill' => $service_refill,
            'service_cancel' => $service_cancel
        ];
        return response()->json($response);
    }
}
