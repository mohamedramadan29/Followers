<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicSetting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Logo(){
        return asset('assets/uploads/PublicSetting/'.$this->website_logo);
    }
    public function Favicon(){

        return asset('assets/uploads/PublicSetting/'.$this->website_favicon);
    }
}
