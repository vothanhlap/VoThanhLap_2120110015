<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Brand;

class BrandContent extends Component
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
        ];
        $list_brand = Brand::where($data)->orderBy('created_at','asc')->take(8)->get();
        return view('components.brand-content',compact('list_brand'));
    }
}
