<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

}
