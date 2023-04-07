<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Models\ProductImage;
use App\Models\ProductStrore;
use App\Models\ProductSale;
use App\Models\Category;
use App\Models\Brand;



class Product extends Model
{
    use HasFactory;
    protected $table = 'vtl_product';
    public $timestamps = false;
    
    public function productimg(): hasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }

    public function soluong(): hasOne
    {
        return $this->hasOne(ProductStore::class, 'product_id','id');
    }
    
}
