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
       
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }
    
}
