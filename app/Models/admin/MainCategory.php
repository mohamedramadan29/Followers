<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    protected $table = 'main_categories';
    protected $guarded = [];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    public function Image(){
        return asset('assets/uploads/category_images/'.$this->image);
    }
}
