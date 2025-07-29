<?php

namespace App\Http\Controllers\admin;

use App\Services\Api;
use App\Models\front\Order;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class OrdersController extends Controller
{
    use Message_Trait;

    public function index()
    {

        ##############
        $cacheKey = 'orders_with_provider_page_' . request()->get('page', 1);
        $orders_with_status = Cache::remember($cacheKey, now()->addMinutes(30), function () {
            // استرجاع الطلبات مع بيانات المزود
            $orders = Order::with('provider')
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

        return view('admin.orders.index', compact('orders_with_status'));
    }

    public function show($id)
    {
        // استرجاع الطلب مع بيانات المزود من الكاش
        $cacheKey = 'order_with_provider_' . $id;
        $order = Cache::remember($cacheKey, now()->addMinutes(30), function () use ($id) {
            return Order::with('provider')->findOrFail($id);
        });

        // استرجاع بيانات حالة الطلب من الكاش أو الـ API
        $cacheKeyStatus = 'order_status_' . $id;
        $provider_details = Cache::remember($cacheKeyStatus, now()->addMinutes(30), function () use ($order) {
            try {
                // التأكد من وجود بيانات المزود
                if ($order->provider) {
                    $api = new Api($order->provider->api_url, $order->provider->api_key);
                    return $api->status($order->order_number);
                }
                return null;
            } catch (\Exception $e) {
                return null; // في حالة حدوث خطأ
            }
        });

        // إضافة بيانات الحالة إلى الطلب
        $order->provider_details = $provider_details;

        return view('admin.orders.show', compact('order'));
    }
    public function delete($id){
        $order = Order::findOrFail($id);
        $order->delete();
        return $this->success_message(' تم حذف الطلب بنجاح  ');
    }

    public function OrdersStatus($status){

        // التحقق من أن الحالة صالحة
        $validStatuses = ['Partial', 'Completed', 'Pending', 'Processing', 'Canceled', 'Refunded'];
        if (!in_array($status, $validStatuses)) {
            abort(404, 'Invalid status');
        }
        $orders_with_status_new = [];

        // إنشاء مفتاح كاش فريد يعتمد على الحالة والصفحة
        $cacheKey = 'orders_with_status_' . $status . '_page_' . request()->get('page', 1);
        $orders_with_status = Cache::remember($cacheKey, now()->addMinutes(30), function () use ($status) {
            // استرجاع الطلبات مع بيانات المزود
            $orders = Order::with('provider')
                ->orderBy('id', 'desc')
                ->get();

            // إذا لم يكن هناك طلبات، إرجاع 404
            if ($orders->isEmpty()) {
                abort(404);
            }

            // إضافة بيانات الحالة من المزود وتصفية الطلبات بناءً على الحالة
            $orders_with_status = $orders->map(function ($order) {
                $cacheKey = 'order_status_' . $order->id;

                // استرجاع بيانات الحالة من الكاش أو الـ API
                $provider_details = Cache::remember($cacheKey, now()->addMinutes(30), function () use ($order) {
                    try {
                        // التأكد من وجود بيانات المزود
                        if ($order->provider) {
                            $api = new Api($order->provider->api_url, $order->provider->api_key);
                            return $api->status($order->order_number);
                        }
                        return null;
                    } catch (\Exception $e) {
                        return null; // في حالة حدوث خطأ
                    }
                });

                $order->provider_details = $provider_details;
                return $order;
            })->filter(function ($order) use ($status) {
                // تصفية الطلبات بناءً على الحالة
                return $order->provider_details && $order->provider_details->status === $status;
            })->values();

            // إذا لم يكن هناك طلبات مطابقة للحالة، إرجاع 404
            if ($orders_with_status->isEmpty()) {
              $orders_with_status_new = [];
            }
            return $orders_with_status;
            return $orders_with_status_new;
        });

        return view('admin.orders.index', compact('orders_with_status','orders_with_status_new'));
    }
}
