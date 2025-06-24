<?php

namespace App\Livewire\Front\LivewireEvent;

use App\Services\Api;
use Livewire\Component;
use App\Models\front\Order;
use App\Models\admin\Product;
use App\Models\admin\Provider;
use App\Models\admin\SubService;
use Illuminate\Support\Facades\Cache;

class ProductDetails extends Component
{
    public $service;
    public $service_from_provider;
    public $sub_service_id;
    public $website_serv_id,$main_service,
    $provider_id,$service_refill,$service_cancel,
    $base_price,$final_price,$provider_final_price,$service_type='main',
    $min,$max,$followers_num,$newBasePrice,$rate_for_one,$profitPercentage,
    $speed_active,$quality_status,$security,$start_time,$speed_active_text,$quality_percentage,$security_text,$start_time_text,$average_execution_time;

    public function mount($slug)
    {
        $this->service = Product::with('Main_Category', 'SubServices')->where('slug', $slug)->firstOrFail();
        $this->loadServiceDetails($this->service->id,$this->service->provider_id, $this->service->service_id, $this->service->profit_percentage,$this->service->speed_active,$this->service->quality_status,$this->service->security,$this->service->start_time,$this->service->speed_active_text,$this->service->quality_percentage,$this->service->security_text,$this->service->start_time_text);
        $this->average_execution_time = $this->calculateAverageExecutionTime($this->main_service, 'main');
    }
    public function updatedSubServiceId($sub_service_id)
    {
        $subService = SubService::find($sub_service_id);
        if (!$subService) {
            $this->loadServiceDetails($this->service->id,$this->service->provider_id, $this->service->service_id, $this->service->profit_percentage,$this->service->speed_active,$this->service->quality_status,$this->service->security,$this->service->start_time,$this->service->speed_active_text,$this->service->quality_percentage,$this->service->security_text,$this->service->start_time_text);
            return;
        }
        $this->loadServiceDetails($subService->id,$subService->provider_id, $subService->provider_service_id, $subService->profit_percentage,$subService->speed_active,$subService->quality_status,$subService->security,$subService->start_time,$subService->speed_active_text,$subService->quality_percentage,$subService->security_text,$subService->start_time_text);
        $this->service_type='sub';
        $this->average_execution_time = $this->calculateAverageExecutionTime($subService->provider_service_id,'sub');
    }

    public function updatedFollowersNum($followers_num){
        if($followers_num >= $this->min && $followers_num <= $this->max){
            $this->final_price = $this->rate_for_one * $followers_num;
            $this->final_price = $this->final_price + ($this->final_price * $this->profitPercentage / 100);
            $this->provider_final_price = $this->rate_for_one * $followers_num;
        }else{
            $this->final_price = $this->base_price;
            $this->provider_final_price = $this->rate_for_one * $this->min;
        }
    }
    private function loadServiceDetails($id,$provider_id, $service_id, $profitPercentage,$speed_active,$quality_status,$security,$start_time,$speed_active_text,$quality_percentage,$security_text,$start_time_text)
    {
        $provider = Provider::findOrFail($provider_id);
        $cacheKey = "provider_service_{$provider_id}_{$service_id}";

        $service = Cache::remember($cacheKey, 3600, function () use ($provider, $service_id) {
            $api = new Api($provider->api_url, $provider->api_key);
            return collect($api->services())->firstWhere('service', $service_id);
        });

        if (!$service) {
            abort(404, 'Service not found');
        }
        $rate_for_one = $service->rate / 1000;
        $base_price = $rate_for_one * $service->min;
        $final_price = $base_price + ($base_price * $profitPercentage / 100);
       // $provider_final_price = $base_price;
        $this->service_from_provider = $service;
        $this->rate_for_one = $rate_for_one;
        $this->followers_num = $service->min;
        $this->profitPercentage = $profitPercentage;
        $this->service_refill = $service->refill;
        $this->service_cancel = $service->cancel;
        $this->base_price = $final_price;
        $this->final_price = $final_price;
        $this->min = $service->min;
        $this->max = $service->max;
        $this->speed_active = $speed_active;
        $this->quality_status = $quality_status;
        $this->security = $security;
        $this->start_time = $start_time;
        $this->speed_active_text = $speed_active_text;
        $this->quality_percentage = $quality_percentage;
        $this->security_text = $security_text;
        $this->start_time_text = $start_time_text;
        $this->website_serv_id = $id;
        $this->main_service = $service_id;
        $this->provider_id = $provider_id;
        $this->service_type='main';
        $this->provider_final_price = $rate_for_one * $service->min;
        $this->average_execution_time = $this->calculateAverageExecutionTime($service_id, 'main');
    }


    ######### Get The Order Excution Time

    private function calculateAverageExecutionTime($serviceId, $serviceType = 'main')
    {
        $cacheKey = "avg_execution_time_{$serviceType}_{$serviceId}";
        return Cache::remember($cacheKey, 3600, function () use ($serviceId, $serviceType) {
            $query = Order::whereIn('status', ['Completed', 'Partial'])
                ->whereNotNull('start_time')
                ->whereNotNull('completed_at');

            if ($serviceType === 'sub') {
                $query->where('main_service_id', $serviceId);
            } else {
                $query->where('main_service_id', $serviceId);
            }

            $orders = $query->latest()->take(10)->get();

            if ($orders->isEmpty()) {
                return null;
            }

            $totalTime = 0;
            $validOrders = 0;

            foreach ($orders as $order) {
                try {
                    // تحويل التواريخ إلى Carbon إذا لزم الأمر
                    $startTime = is_string($order->start_time) ? \Carbon\Carbon::parse($order->start_time) : $order->start_time;
                    $completedAt = is_string($order->completed_at) ? \Carbon\Carbon::parse($order->completed_at) : $order->completed_at;

                    // التحقق من أن التواريخ صالحة
                    if ($startTime instanceof \Carbon\Carbon && $completedAt instanceof \Carbon\Carbon) {
                        // حساب الفرق الزمني (completed_at - start_time) وأخذ القيمة المطلقة
                        $duration = abs($completedAt->diffInSeconds($startTime));

                        // التحقق من أن الكمية صالحة (إيجابية وغير صفرية)
                        if ($order->quantity > 0) {
                            $durationPer100 = $duration / ($order->quantity / 100);
                            $totalTime += $durationPer100;
                            $validOrders++;
                        } else {
                            \Illuminate\Support\Facades\Log::warning("Invalid quantity for order {$order->id}: quantity={$order->quantity}");
                        }
                    } else {
                        \Illuminate\Support\Facades\Log::warning("Invalid date format for order {$order->id}: start_time={$order->start_time}, completed_at={$order->completed_at}");
                    }
                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::warning("Failed to parse dates for order {$order->id}: {$e->getMessage()}");
                    continue;
                }
            }

            if ($validOrders === 0) {
                return null;
            }

            $averageTimeInSeconds = $totalTime / $validOrders;
            return round(abs($averageTimeInSeconds) / 60, 2); // إرجاع المتوسط بالدقائق (إيجابي دائمًا)
        });
    }

    public function render()
    {
        return view('front.livewire-event.product-details');
    }
}
