<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;

class SiteController extends Controller
{
    public function index($slug = null)
    {
         if($slug == null){
            return $this->home();
         }
         else
         {
             $link = Link::where('slug','=','$slug')->first();
         }
        
    }

    public function home ()
    {
        return view ('frontend.home');
    }
    
 
}
