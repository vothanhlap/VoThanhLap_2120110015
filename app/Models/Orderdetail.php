<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'vtl_order_detail';
    public $timestamps = false;

    public function productimg(): hasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id','product_id');
    }

    public function sanpham(): hasOne
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function donhang(): hasOne
    {
        return $this->hasOne(Orderdetail::class, 'order_id','id');
    }


}
