<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Models\Customer;
class Order extends Model
{
    use HasFactory;
    protected $table = 'vtl_order';
    public $timestamps = false;

    public function sanpham(): hasOne
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }
    public function donhang(): hasOne
    {
        return $this->hasOne(Orderdetail::class, 'id','order_id');
    }
    public function khachhangname(): hasOne
    {
        return $this->hasOne(Customer::class, 'id','cus_id');
    }
    

    
}
