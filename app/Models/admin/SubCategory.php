<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function SubServicesProducts(){
        return $this->hasMany(Product::class, 'sub_category_id');
    }
    public function Image(){
        return asset('assets/uploads/Subcategory_images/'.$this->image);
    }
    public function MainCategory(){
        return $this->belongsTo(MainCategory::class,'parent_id');
    }
}
