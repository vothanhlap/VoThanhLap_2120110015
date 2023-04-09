<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class FooterMenuItem extends Component
{
    public $row_menu = null;
    /**
     * Create a new component instance.
     */
    public function __construct($menu)
    {
        $this->row_menu=$menu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu=$this->row_menu;
        $dk =[
            ['status','=','1'],
            ['parent_id','=',$menu->id],
            ['position','=','footermenu']

        ];
        $list_menu_sub = Menu::where($dk)->orderBy('sort_order','asc')->get();
        $sub = false;
        if(count($list_menu_sub)>0){
            $sub = true;
        }
        return view('components.footer-menu-item',compact('menu','list_menu_sub','sub'));
    }
}
