<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Services\Api;
use App\Models\front\User;
use App\Models\front\Order;
use App\Models\admin\Provider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        // جلب الطلبات غير المكتملة
        $orders = Order::whereIn('status', ['Pending', 'Processing'])->get();

        foreach ($orders as $order) {
            DB::beginTransaction();
            try {
                $provider = Provider::findOrFail($order->provider_id);
                $api = new Api($provider->api_url, $provider->api_key);

                // الاستعلام عن حالة الطلب
                $statusResponse = $api->status($order->order_number); // افترض أن API يحتوي على دالة status
                $status = $statusResponse->status ?? 'Pending';
                $mappedStatus = $this->mapProviderStatus($status);

                // تحديث حالة الطلب
                $order->status = $mappedStatus;

                // تحديث وقت الاكتمال إذا كان الطلب مكتملًا أو مكتملًا جزئيًا
                if (in_array($mappedStatus, ['Completed', 'Partial']) && !$order->completed_at) {
                    $order->completed_at = now();
                }

                // التعامل مع الإلغاء أو الاسترداد
                if (in_array($mappedStatus, ['Canceled', 'Refunded'])) {
                    // إعادة المبلغ إلى رصيد المستخدم
                    $user = User::find($order->user_id);
                    if ($user) {
                        $user->balance += $order->total_price;
                        $user->save();
                    }
                }

                $order->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                Log::error("Failed to check order {$order->order_number}: {$e->getMessage()}");
            }
        }

        $this->info('Order status check completed.');
    }

    private function mapProviderStatus($providerStatus): string
    {
        // تحويل حالة المزود إلى الحالات الداخلية
        $statusMap = [
            'partial' => 'Partial',
            'completed' => 'Completed',
            'pending' => 'Pending',
            'processing' => 'Processing',
            'canceled' => 'Canceled',
            'refunded' => 'Refunded',
        ];

        return $statusMap[strtolower($providerStatus)] ?? 'Pending';
    }
}

