<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Page;
use Carbon\Carbon;
class MenuController extends Controller
{
   
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_menu = Menu::where('status', '!=', 0)->get();
        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();
        $list_topic = Topic::where('status', '!=', 0)->get();
        $list_page = Page::where('status', '!=', 0)->get();
       return view ('backend.menu.index', compact('user_name','list_category', 'list_brand','list_topic','list_page', 'list_menu'));
    }

    public function trash()
    {
        $user_name = Auth::user()->name;
       return view ('backend.menu.trash', compact('user_name'));
    }
//Xử lý thêm
    public function store(Request $request)
    {
        $position = $request->position;
        if($request->ThemCategory)
        {

            $user_name = Auth::user()->name;
            $list_id = $request->nameCategory;
            foreach($list_id as $id){
                $category = Category::find($id);
                $menu = new Menu();
                // $menu->name = $category->name;
                // $menu->link = $category->slug;
                $menu->sort_orders =0;
                // $menu->table_id = $category->id;
                $menu->types = "category";
                $menu->posistion = $posistion;
                $menu->status = 2;
                $menu->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
                $menu->created_by = $user_name;
                $menu ->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm mẫu tin thành công !']);
        }
        if($request->ThemBrand)
        {
            echo "Them Brand";
        }
        if($request->ThemPage)
        {
            echo "Them Page";
        }
        if($request->ThemTopic)
        {
            echo "Them Topic";
        }
        if($request->ThemCustom)
        {
            echo "Them Custom";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
