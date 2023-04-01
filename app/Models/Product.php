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
   
    public function Product(): hasMany
    {
        $image = ProductImage::find(1)->image()->where('id','product_id')->first();
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }
}
