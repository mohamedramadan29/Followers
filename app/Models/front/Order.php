<?php

namespace App\Models\front;

use App\Models\front\User;
use App\Models\admin\Review;
use App\Models\admin\Product;
use App\Models\admin\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review(){
        return $this->hasOne(Review::class, 'order_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
