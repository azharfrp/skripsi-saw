<?php

namespace Database\Seeders;

use App\Models\Brand;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::insert([
            ['name' => "Xiaomi"],
            ['name' => "Samsung"],
            ['name' => "Oppo"],
            ['name' => "Vivo"],
            ['name' => "Realme"],
            ['name' => "OnePlus"],
            ['name' => "Asus"],
            ['name' => "Motorola"],
            ['name' => "Nothing"],
            ['name' => "Google"],
            ['name' => "Honor"],
            ['name' => "Infinix"],
            ['name' => "Tecno"],
            ['name' => "Nokia"],
            ['name' => "Sony"],
            ['name' => "BlackBerry"],
            ['name' => "Fairphone"],
            ['name' => "Leica"],
            ['name' => "Sharp"],
            ['name' => "ZTE"],
            ['name' => "Lenovo"],
            ['name' => "Huawei"],
            ['name' => "Meizu"],
            ['name' => "RedMagic"],
            ['name' => "Black Shark"],
        ]);
    }
}
