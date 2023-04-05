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
                     
                      case 'brand':
                          {return $this->product_brand($slug);}
                          
                      case 'topic':
                          {return $this->post_topic ($slug);}
                           
                           case 'page':
                              {return $this->post_page ($slug);}
                                
                  default:
                             {return $this->error404($slug);} 
                      break;
                }
             }
             else
             {
                $product = Product::where(['slug','=',$slug],['status','=','1'])->first();
                 if($product !=null){
                    $this->product_detail($product);
                 }else
                 {
                    $post = Post::where([['status', '=', 1], ['slug', '=', $slug], ['type', '=', 'post']])->first();
                    if ($post != NULL) {
                        $this->post_detail($post);
                    } else {
                        return $this->error_404($slug);
                    }
                 }
            }
             
            
         }
        
    }

    //trang chu
    public function home ()
    {
        $data = [
            ['status','=','1'],
        ];
        //$product_home =Product::where($data)->take(12)->get();
        $category_home =Product::where($data)->get();
        return view ('frontend.home.home',compact('category_home'));
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
