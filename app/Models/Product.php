<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Model\ProductImage;

class Product extends Model
{
    use HasFactory;
    protected $table = 'vtl_product';
    public $timestamps = false;
    
    public function productimg(): hasMany
    {
        $product_image = $product->productimg;
         $hinh = '';
         if(count($product_image)>0)
        {
            $hinh = $product_image[0]["image"];
        }
       
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }
    
}
