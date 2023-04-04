<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
use App\Models\ProductImage;

class NavSale extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            ['status','=','1'],
            ['sale','=','1'],
        ];
        $list_product = Product::where($data)->orderBy('created_at','desc')->take(4)->get();
        return view('components.nav-sale',compact('list_product'));
    }
}
