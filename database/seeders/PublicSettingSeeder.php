<?php

namespace Database\Seeders;

use App\Models\admin\PublicSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = new PublicSetting();
        $setting->create([
            'website_name'=>' متجر المتابعين  ',
            'website_short_desc'=>' وصف متجر المتابعين  ',
            'website_description'=>' وصف متجر المتابعين  '
        ]);

    }
}
