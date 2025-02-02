<?php

namespace App\Http\Controllers\admin;

use App\Services\Api;
use App\Models\front\Order;
use Illuminate\Http\Request;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    use Message_Trait;

    public function index()
    {
        // استرجاع الطلبات مع بيانات المزود
        $orders = Order::with('provider') // تحميل المزود مع الطلبات
            ->orderBy('id', 'desc')
            ->get();

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

        return view('admin.orders.index', compact('orders_with_status'));
    }
}
