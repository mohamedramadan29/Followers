<?php

namespace Database\Seeders;

use App\Models\admin\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $permisions = [];
        foreach (config('permissions') as $key => $value) {
            $permisions[] = $key;
        }
        Role::create([
            'role' => 'مدير',
            'permissions' => json_encode($permisions)
        ]);
    }
}
