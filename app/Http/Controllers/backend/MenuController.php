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
use App\Models\Post;
use App\Models\Product;
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
//thung rac
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_menu = Menu::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.menu.trash', compact('user_name','list_menu'));
    }
     #GET: admin/menu/create
     public function create()
     {
         $list_menu = Menu::where('status', '!=', 0)->get();
         $html_parent_id = '';
         $html_sort_order = '';
 
         foreach ($list_menu as $item) {
             $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
             $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
         }
         return view('backend.menu.create', compact('html_parent_id', 'html_sort_order'));
     }
//Xử lý thêm
    public function store(Request $request)
    {
        $position = $request->position;
        if(isset($request->ThemCategory))
        {

            $user_name = Auth::user()->name;
            $list_id = $request->checkIdCategory;
            foreach($list_id as $id){
                $category = Category::find($id);
                $menu = new Menu();
                $menu->name = $category->name;
                $menu->link = $category->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'category';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
                $menu->created_by = $user_name;
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm mẫu tin thành công !']);
        }
        if(isset($request->ThemBrand))
        {
            $list_id = $request->checkIdBrand;
            foreach ($list_id as $id) {
                $brand = Brand::find($id);
                $menu = new Menu();
                $menu->name = $brand->name;
                $menu->link = $brand->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'brand';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
                $menu->created_by =  $user_name;
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu thành công!']);
        }
        if(isset($request->ThemTopic))
        {
            $list_id = $request->checkIdTopic;
            foreach ($list_id as $id) {
                $topic = Topic::find($id);
                $menu = new Menu();
                $menu->name = $topic->title;
                $menu->link = $topic->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'topic';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
                $menu->created_by =  $user_name;
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu thành công!']);
        }

        if(isset($request->ThemPage))
        {
            $list_id = $request->checkIdPage;
            foreach ($list_id as $id) {
                $page = Page::find($id);
                $menu = new Menu();
                $menu->name = $page->title;
                $menu->link = $page->slug;
                $menu->table_id = $id;
                $menu->parent_id = 0;
                $menu->sort_order = 1;
                $menu->type = 'page';
                $menu->position = $request->position;
                $menu->status = 2;
                $menu->created_at =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
                $menu->created_by =  $user_name;
                $menu->save();
            }
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu thành công!']);
        }
        if(isset($request->ThemCustom))
        {
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->link = $request->link;
            $menu->parent_id = 0;
            $menu->sort_order = 1;
            $menu->type = 'custom';
            $menu->position = $request->position;
            $menu->status = 2;
            $menu->created_at =  Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $menu->created_by =  $user_name;
            $menu->save();
            return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thêm menu thành công!']);
        }
    }
     #GET:admin/menu/status/{id}
     public function status($id)
     {
        $user_name = Auth::user()->name;
         $menu = Menu::find($id);
         if ($menu == null) {
             return redirect()->route('menu.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
         }
         $menu->status = ($menu->status == 1) ? 2 : 1;
         $menu->updated_at = date('Y-m-d H:i:s');
         $menu->updated_by =  $user_name;
         $menu->save();
         return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
     }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('menu.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.menu.show', compact('user_name','menu'));
    }

      #GET:admin/menu/delete/{id}
      public function delete($id)
      {
          $menu = Menu::find($id);
          if ($menu == null) {
              return redirect()->route('menu.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
          }
          $menu->status = 0;
          $menu->updated_at = date('Y-m-d H:i:s');
          $menu->updated_by = 1;
          $menu->save();
          return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
      }
      #GET:admin/menu/restore/{id}
      public function restore($id)
      {
          $menu = Menu::find($id);
          if ($menu == null) {
              return redirect()->route('menu.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
          }
          $menu->status = 2;
          $menu->updated_at = date('Y-m-d H:i:s');
          $menu->updated_by = 1;
          $menu->save();
          return redirect()->route('menu.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
      }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_name = Auth::user()->name;
        $menu = Menu::find($id);
        $list_menu = Menu::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_menu as $item) {
            if ($menu->parent_id == $item->id) {
                $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
            } else {
                $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
            if ($menu->sort_order == $item->id) {
                $html_sort_order .= '<option selected value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
            } else {
                $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
            }
        }
        return view('backend.menu.edit', compact('user_name','menu', 'html_parent_id', 'html_sort_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->parent_id = $request->parent_id;
        $menu->sort_order = $request->sort_order+1;
        $menu->status = $request->status;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = 1;
        $menu->save();
        return redirect()->route('menu.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật menu thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
