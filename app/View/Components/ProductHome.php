<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
use App\Models\Category;

class ProductHome extends Component
{
     public $cat = null;
   
    public function __construct($cat)
    {
       $this->cat=$cat;
    }
    public function render(): View|Closure|string
    {
        $row_category = $this->cat;
        $catid = $row_category->id;
        $arrcatid = array();
        array_push($arrcatid, $catid);
        $list_category2 = Category::where([['status','=','1'],['parent_id','=', $catid]])->get();
        if(count($list_category2)>0)
        {
            foreach($list_category2 as $cat2)
            {
                array_push($arrcatid, $cat2->id);
                $list_category3 = Category::where([['status','=','1'],['parent_id','=', $cat2->id]])->get();
                if(count($list_category3)>0)
                {              
                    foreach($list_category3 as $cat3)
                    {
                        array_push($arrcatid, $cat3->id);
                    }  
                }
            }
        }
       // var_dump($arrcatid);
        $list_product = Product::join('vtl_brand','vtl_brand.id','=','vtl_product.brand_id')
        ->whereIn('category_id',$arrcatid)
        ->where('vtl_product.status','=','1')
        ->select('vtl_product.*', 'vtl_brand.name as braname')
        ->orderBy('vtl_product.created_at','desc')
        ->take(12)
        ->get();
        return view('components.product-home',compact('list_product'));
    }
}
