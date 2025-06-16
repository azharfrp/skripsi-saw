<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Ref: di database nama tablenya adalah "brands"
// Ref: migrasi table brands ada di \database\migrations\2025_06_09_061656_create_brands_table.php
// Ref: seeder data dummy brands ada di \Database\Seeders\BrandSeeder.php

class Brand extends Model{
    protected $table = 'brands';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'brand_id');
    }
}
