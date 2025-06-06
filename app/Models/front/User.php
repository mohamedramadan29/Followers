<?php

namespace App\Models\front;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $dates = ['created_at', 'updated_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image',
        'person_info',
        'balance',
        'balance_spent',
        'order_balance_now',
        'total_orders',
        'sex',
        'city',
        'birthday',
        'account_status',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAccountStatusAttribute($account_status){
        if($account_status == 1){
            return 'مفعل';
        }else{
            return 'غير مفعل';
        }
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
