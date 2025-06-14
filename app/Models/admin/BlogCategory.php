<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Image(){
        return asset('assets/uploads/BlogCategory/'.$this->image);
    }
}
