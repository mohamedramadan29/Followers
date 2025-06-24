<?php

namespace App\Http\Controllers\front\User;

use App\Services\Api;
use App\Models\front\User;
use App\Models\front\Order;
use Illuminate\Http\Request;
use App\Models\admin\Provider;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserOrdersController extends Controller
{
    use Message_Trait;

    public function index()
    {
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

        // إرجاع العرض مع البيانات المخزنة في الكاش
        return view('front.users.orders.orders', compact('orders_with_status'));
    }

    ############################### start Refill Order ###################

    public function refill(Request $request, $order_number)
    {
        // استخراج provider_id من الطلب
        $provider_id = $request->provider_id;

        // الحصول على الطلب بناءً على order_number و provider_id
        $order = Order::where('order_number', $order_number)
            ->where('provider_id', $provider_id)
            ->first();

        // التحقق إذا كان الطلب موجود
        if (!$order) {
            return redirect()->route('orders')->with('error', 'الطلب غير موجود.');
        }

        // إنشاء كائن من الـ API باستخدام بيانات المزود
        $api = new Api($order->provider->api_url, $order->provider->api_key);

        // استدعاء الـ API للحصول على نتيجة عملية التعبئة
        $refill = $api->refill($order->order_number);

        // التحقق من الاستجابة
        if (isset($refill->refill)) {
            // إذا كانت الاستجابة تحتوي على قيمة refill، تحديث الطلب
            $order->refill_status = $refill->status;
            $order->save();

            // إعادة توجيه المستخدم مع رسالة نجاح
            // return redirect()->route('orders')->with('success', 'تم تنفيذ عملية التعبئة بنجاح.');

            return $this->success_message('تم تنفيذ عملية التعبئة بنجاح.');
        } else {
            // في حالة وجود خطأ أو عدم وجود قيمة refill في الاستجابة
            //return redirect()->route('orders')->with('error', 'فشل في عملية التعبئة. يرجى المحاولة لاحقًا.');
            return $this->Error_message('فشل في عملية التعبئة. يرجى المحاولة لاحقًا.');
        }
    }

    ############################## Start Cancel Order ####################
    public function cancel(Request $request, $order_number)
    {
        // استخراج provider_id من الطلب
        $provider_id = $request->provider_id;

        // الحصول على الطلب بناءً على order_number و provider_id
        $order = Order::where('order_number', $order_number)
            ->where('provider_id', $provider_id)
            ->first();

        // التحقق إذا كان الطلب موجود
        if (!$order) {
            return redirect()->route('orders')->with('error', 'الطلب غير موجود.');
        }

        // إنشاء كائن من الـ API باستخدام بيانات المزود
        $api = new Api($order->provider->api_url, $order->provider->api_key);

        // استدعاء الـ API للحصول على نتيجة عملية التعبئة
        $cancel = $api->cancel($order->order_number);
        // dd($cancel);
        // التحقق من الاستجابة
        if (isset($cancel->cancel)) {
            // إذا كانت الاستجابة تحتوي على قيمة cancel، تحديث الطلب
            $order->cancel_status = $cancel->cancel;
            $order->save();
            ##########  Update User Balance
            $user_id = $order['user_id'];
            $user = User::findOrFail($user_id);
            $userbalance = $user['balance'] + $order['total_price'];
            $user->balance = $userbalance;
            $user->save();
            return $this->success_message('تم تنفيذ عملية الالغاء بنجاح.');
        } else {
            return $this->Error_message('فشل في عملية الالغاء . يرجى المحاولة لاحقًا.');
        }
    }
    ############################## End Cancel Order ######################
}
