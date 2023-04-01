<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;
class navleft extends Component
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
            ['parent_id','=','0'],
          
        ];
        $list_category = Category::where($data)->orderBy('created_at','asc')->get();
        return view('components.menu.navleft',compact('list_category'));
    }
}
