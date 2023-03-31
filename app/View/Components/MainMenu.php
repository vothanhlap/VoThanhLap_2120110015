<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenu extends Component
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
        $menu = [
            ['status','=','1'],
            ['parent_id','=','0'],
            ['posistion','=','mainmenu'],
        ];
        $list_menu = Menu::where($menu)->orderBy('sort_orders','asc')->get();
        return view('components.main-menu',compact('list_menu'));
    }
}
