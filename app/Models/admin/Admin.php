<?php

namespace App\Models\admin;
use App\Models\admin\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'email', 'phone', 'password', 'account_type', 'status', 'role_id'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function Role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasAccess($config_permission)
    {
        $role = $this->Role;

        if (!$role || empty($role->permissions)) {
            return false;
        }

        // تأكد من أن الصلاحيات يتم تحليلها كمصفوفة
        $permissions = json_decode($role->permissions, true);

        if (!is_array($permissions)) {
            return false;
        }

        return in_array($config_permission, $permissions);
    }



}
