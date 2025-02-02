<?php

namespace App\Models\admin;

use App\Models\admin\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'permissions'];

    public function admins(){
        return $this->hasMany(admin::class,'role_id');
    }
}
