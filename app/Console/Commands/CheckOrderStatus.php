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
        $orders = Order::with('provider')->get();

        foreach ($orders as $order) {
            DB::beginTransaction();
            try {
                $provider = $order->provider;
                if (!$provider) {
                    Log::warning("No provider found for order {$order->order_number}");
                    continue;
                }

                $api = new Api($provider->api_url, $provider->api_key);
                $statusResponse = $api->status($order->order_number);
                $status = $statusResponse->status ?? 'Pending';
                $mappedStatus = $this->mapProviderStatus($status);

                if ($order->status !== $mappedStatus) {
                    $order->status = $mappedStatus;

                    if (in_array($mappedStatus, ['Completed', 'Partial']) && !$order->completed_at) {
                        $order->completed_at = now();
                    }

                    if (in_array($mappedStatus, ['Canceled', 'Refunded'])) {
                        $user = $order->user;
                        if ($user) {
                            $user->balance += $order->total_price;
                            $user->save();
                        }
                    }
                    $order->save();
                }

                DB::commit();
                $this->info("Checked order {$order->order_number} with status: {$mappedStatus}");
            } catch (\Exception $e) {
                DB::rollback();
                Log::error("Failed to check order {$order->order_number}: {$e->getMessage()}");
            }
        }

        $this->info('Order status check completed.');
    }

    private function mapProviderStatus($providerStatus): string
    {
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

