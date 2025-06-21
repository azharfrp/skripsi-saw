<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Ref: di database nama tablenya adalah "products"
// Ref: migrasi table brands ada di \database\migrations\2025_06_09_061737_create_products_table.php
// Ref: seeder data dummy brands ada di \Database\Seeders\ProductSeeder.php

class Product extends Model{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'brand_id',
        'model',
        'price',
        'performance',
        'battery',
        'camera',
        'storage',
        'thumbnail_path',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
