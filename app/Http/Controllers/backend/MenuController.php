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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
