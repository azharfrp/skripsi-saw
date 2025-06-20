<?php

namespace Database\Seeders;

use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'brand_id' => 2,
                'model' => "Galaxy S24 Ultra",
                'price' => 22000000,
                'performance' => 1600000,
                'battery' => 5000,
                'camera' => 200,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/Samsung-Galaxy-S24-Ultra.jpg',
            ],
            [
                'brand_id' => 4,
                'model' => "X100 Pro",
                'price' => 16500000,
                'performance' => 1500000,
                'battery' => 5400,
                'camera' => 200,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/Vivo-X100-Pro.jpg',
            ],
            [
                'brand_id' => 11,
                'model' => "Magic 6 Pro",
                'price' => 16000000,
                'performance' => 1450000,
                'battery' => 5600,
                'camera' => 200,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/Honor-Magic-6-Pro.jpg',
            ],
            [
                'brand_id' => 3,
                'model' => "Find X7 Ultra",
                'price' => 18000000,
                'performance' => 1550000,
                'battery' => 5000,
                'camera' => 200,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/Oppo-Find-X7-Ultra.jpg',
            ],
            [
                'brand_id' => 23,
                'model' => "21 Pro",
                'price' => 11000000,
                'performance' => 1250000,
                'battery' => 5050,
                'camera' => 200,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/Meizu-21-Pro.jpg',
            ],
            [
                'brand_id' => 8,
                'model' => "Edge 40 Ultra",
                'price' => 14000000,
                'performance' => 1350000,
                'battery' => 4600,
                'camera' => 200,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/Motorola-Edge-40-Ultra.jpg',
            ],
            [
                'brand_id' => 2,
                'model' => "Galaxy Tab S9 Ultra",
                'price' => 18000000,
                'performance' => 1300000,
                'battery' => 11200,
                'camera' => 13,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/Samsung-Galaxy-Tab-S9.jpg',
            ],
            [
                'brand_id' => 1,
                'model' => "Xiaomi 14 Pro",
                'price' => 15000000,
                'performance' => 1450000,
                'battery' => 5000,
                'camera' => 200,
                'storage' => 256,
                'thumbnail_path' => 'asset/phone/Xiaomi-14-Pro.jpg',
            ],
            [
                'brand_id' => 7,
                'model' => "Zenfone 11 Ultra",
                'price' => 13000000,
                'performance' => 1400000,
                'battery' => 5000,
                'camera' => 200,
                'storage' => 256,
                'thumbnail_path' => 'asset/phone/Asus-Zenfone-11-Ultra.jpg',
            ],
            [
                'brand_id' => 24,
                'model' => "9 Pro",
                'price' => 13000000,
                'performance' => 1500000,
                'battery' => 6500,
                'camera' => 50,
                'storage' => 512,
                'thumbnail_path' => 'asset/phone/RedMagic-9-Pro.jpg',
            ],
        ]);
    }
}
