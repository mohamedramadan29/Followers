<?php

namespace App\Models\admin;

use Instagram\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function Category(){
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
    public function Author(){
        return $this->belongsTo(User::class,'author');
    }
    public function Image(){
        return asset('assets/uploads/Blogs/'.$this->image);
    }

}
