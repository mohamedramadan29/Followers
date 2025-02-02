<?php

namespace App\Models\front;

use App\Models\admin\Provider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
