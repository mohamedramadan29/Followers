<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function Category(){
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
}
