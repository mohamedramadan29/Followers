<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Api;
use Illuminate\Support\Facades\Cache;
class Product extends Model
{
    protected $guarded = [];
    use HasFactory;
    // علاقة مع الفئة الرئيسية
    public function Main_Category()
    {
        return $this->belongsTo(MainCategory::class, 'category_id');
    }

    // علاقة مع الفئة الفرعية
    public function Sub_Category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function Provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function SubServices()
    {
        return $this->hasMany(SubService::class, 'product_id');
    }
    public function Image(){
        return asset('assets/uploads/product_images/'.$this->image);
    }

    public function Reviews(){
        return $this->hasMany(Review::class, 'service_id');
    }

    ########## Get Service Data From Provider #########
    public function getServiceDataFromProvider($provider,$service_id){
        $cacheKey = "provider_service_{$provider->id}_{$service_id}";
        $service_from_provider = Cache::remember($cacheKey, 3600, function () use ($provider, $service_id) {
            $api = new Api($provider->api_url, $provider->api_key);
            $services = $api->services();
            return collect($services)->firstWhere('service', $service_id);
        });
        return $service_from_provider;
    }

}
