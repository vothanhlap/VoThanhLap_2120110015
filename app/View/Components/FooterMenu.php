<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;
class FooterMenu extends Component
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
        $dk = [
            ['status','=','1'],
            ['parent_id','=','0'],
            ['position','=','footermenu']
        ];
        $menu_footer = Menu::where($dk)->get();
        return view('components.footer-menu',compact('menu_footer'));
    }
}
