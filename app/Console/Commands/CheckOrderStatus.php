<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Services\Api;
use App\Models\front\Order;
use Illuminate\Console\Command;

class CheckOrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:check-order-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the status of orders and update their end time when completed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // استرجاع الطلبات التي لا تحتوي على وقت انتهاء بعد
        $orders = Order::whereNull('end_time')->get();
         // عملية التحقق لكل طلب
         foreach ($orders as $order) {
            $api = new Api($order->provider->api_url, $order->provider->api_key);
            // التحقق من حالة الطلب
            $status = $api->status($order->order_number);
            // إذا كانت الحالة مكتملة
            if ($status->status == 'completed') {
                // سجل وقت الانتهاء الفعلي
                $order->end_time = Carbon::now();
                $order->save();
                // طباعة رسالة في الـ CLI لتأكيد التحديث
                $this->info("Order {$order->order_number} has been completed.");
            }
        }
        return 0;
    }
}
