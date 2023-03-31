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
            //kiem tra trong bang co link chua slug
             $link = Link::where('slug', '=',$slug)->first();
             if($link !=null){
                $type = $link->type;
                switch ($type) {
                  case 'category':
                     {return $this->product_category($slug);}
                      break;
                      case 'brand':
                          {return $this->product_brand($slug);}
                           break;
                      case 'topic':
                          {return $this->post_topic ($slug);}
                           break;  
                           case 'page':
                              {return $this->post_page ($slug);}
                               break;  
                  default:
                             {return $this->error404($slug);} 
                      break;
                }
             }
             else
             {
                $product = Product::where(['slug','=',$slug],['status','=','1'])->first();
                 if($product !=null){
                    echo 'Co';
                 }else
                 {
                    echo 'Khong';
                 }
            }
             
            
         }
        
    }

    //trang chu
    public function home ()
    {
        return view ('frontend.home.home');
    }
     //loai san pham
     public function product_category ()
     {
         return view ('frontend.product.product-category');
     }
      //thuong hieu san pham
      public function product_brand ()
      {
          return view ('frontend.product.product-brand');
      }
       //chu de bai viet
       public function post_topic()
       {
           return view ('frontend.post.post-topic');
       }
    
 
}
