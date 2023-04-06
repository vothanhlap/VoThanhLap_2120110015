<?php
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;

class SiteController extends Controller
{

    public function index($slug = null)
    {
        if ($slug == null) {
            // return view('frontend.home');
            return $this->home();
        } else {
            $link = Link::where('slug', '=', $slug)->first();
            if ($link != NULL) {
                $type = $link->type;
                switch ($type) {
                    case 'brand': {
                            return $this->product_brand($slug);
                            break;
                        }
                    case 'category': {
                            return $this->product_category($slug);
                            break;
                        }
                    case 'topic': {
                            return $this->post_topic($slug);
                            break;
                        }
                    case 'page': {
                            return $this->post_page($slug); //bảng post có 2 kiểu type là post và page, page sẽ được lưu vào bảng link
                            break;
                        }
                }
            } else {
                $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
                if ($product != NULL) {
                    return $this->product_detail($product);
                } else {
                    $post = Post::where([['status', '=', 1], ['slug', '=', $slug], ['type', '=', 'post']])->first();
                    if ($post != NULL) {
                        return $this->post_detail($post);
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
            ['parent_id','=','0'],
        ];
        $category_home =Category::where($data)->take(3)->get();
        return view ('frontend.home.home',compact('category_home'));
    }
     //loai san pham
     public function product_category ($slug)
     {
        $cat = [
            ['status','=','1'],
            ['slug','=',$slug],
        ];
        $row_category = Category::where($cat)->first();
        $catid = $row_category->id;
        $arrcatid = array();
        array_push($arrcatid, $catid);
        $list_category2 = Category::where([['status','=','1'],['parent_id','=', $catid]])->get();
        if(count($list_category2)>0)
        {
            foreach($list_category2 as $cat2)
            {
                array_push($arrcatid, $cat2->id);
                $list_category3 = Category::where([['status','=','1'],['parent_id','=', $cat2->id]])->get();
                if(count($list_category3)>0)
                {              
                    foreach($list_category3 as $cat3)
                    {
                        array_push($arrcatid, $cat3->id);
                    }  
                }
            }
        }
       //var_dump( $row_category);
        $list_product = Product::whereIn('category_id',$arrcatid)->where('status','=','1')->orderBy('created_at','desc')
        ->paginate(15);
        return view ('frontend.product.product-category');
     }
      //thuong hieu san pham
      public function product_brand ()
      {
          return view ('frontend.product.product-brand');
      }
       //chi tiet san pham
       public function product_detail ()
       {
           return view ('frontend.product.product_detail');
       }
       //chu de bai viet
       public function post_topic()
       {
           return view ('frontend.post.post-topic');
       }
    
 
}
