<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','payment_method','payment_status','amount','payment_id','created_at','updated_at'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
