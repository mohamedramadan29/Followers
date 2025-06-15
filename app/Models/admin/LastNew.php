<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class LastNew extends Model
{
    protected $guarded = [];

    public function Image(){
        return asset('assets/uploads/News/'.$this->image);
    }
}
