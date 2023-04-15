<?php
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\ProductValue;
use App\Models\Post;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Slider;
use Mail;

class SiteController extends Controller
{

    public function index($slug = null)
    {
        if ($slug == null) {
            
            return $this->home();
        } else {
            $link = Link::where('slug', '=', $slug)->first();
            if ($link != NULL) {
                $type = $link->type;
                switch ($type) {
                    case 'brand': {
                            return $this->product_brand($slug);
                          
                        }
                    case 'category': {
                            return $this->product_category($slug);
                           
                        }
                    case 'topic': {
                            return $this->post_topic($slug);
                           
                        }
                    case 'page': {
                            return $this->post_page($slug); //bảng post có 2 kiểu type là post và page, page sẽ được lưu vào bảng link
                         
                        }
                }
            } else {
                $product = Product::join('vtl_brand','vtl_brand.id','=','vtl_product.brand_id')
                ->select('vtl_product.*', 'vtl_brand.name as braname')
                ->where([['vtl_product.status', '=', 1], ['vtl_product.slug', '=', $slug]])
                ->first();
                if ($product != NULL) {
                    return $this->product_detail($product);
                } 
                else 
                {
                    $dk=
                    [['status', '=', 1],
                     ['slug', '=', $slug], 
                     ['type', '=', 'post']
                    ];
                    $post = Post::where($dk)->first();
                    if ($post !=null) 
                    {
                        //echo 'co bai viet';
                        return $this->post_detail($post);
                    } 
                    else 
                    {
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
        $data1 = [
            ['status','=','1'],
            ['position','=','slidefooter']
        ];
        $category_home =Category::where($data)->take(3)->get();
        $top_home =Topic::where($data)->take(3)->get();
        $slider =Slider::where($data1)->take(1)->get();
        
        return view ('frontend.home.home',compact('slider','category_home','top_home'));
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

        $list_product = Product::whereIn('category_id',$arrcatid)->where('status','=','1')->orderBy('created_at','desc')
        ->paginate(12);
        return view ('frontend.product.product-category',compact('list_product','row_category'));
     }
      // san pham theo thuong hieu
      public function product_brand ($slug)
      {
        $bra = [
            ['status','=','1'],
            ['slug','=',$slug],
        ];
         $row_brand = Brand::where($bra)->first();
         $braid = $row_brand->id;
         $arrbraid = array();
          array_push($arrbraid, $braid);
          $list_product= Product::whereIn('brand_id',$arrbraid)->where('status','=','1')->orderBy('created_at','desc')
          ->paginate(12);
          return view ('frontend.product.product-brand',compact('row_brand','list_product'));
      }
       //chi tiet san pham
       public function product_detail ($product)
       {    
        $arrcatid = array();
        array_push($arrcatid, $product->category_id);
        $list_category2 = Category::where([['status','=','1'],['parent_id','=', $product->category_id]])
        ->get();
        if(count($list_category2)>0)
        {
            foreach($list_category2 as $cat2)
            {
                array_push($arrcatid, $cat2->id);
                $list_category3 = Category::where([['status','=','1'],['parent_id','=', $cat2->id]])
                ->get();
                if(count($list_category3)>0)
                {              
                    foreach($list_category3 as $cat3)
                    {
                        array_push($arrcatid, $cat3->id);
                    }  
                }
            }
        }
             $list_pro = Product::whereIn('category_id',$arrcatid)->where([['status','=','1'],['id','!=',$product->id]])
             ->orderBy('created_at','desc')
             ->take(4)
             ->get();
             $list_value = ProductValue::where('name','=','Configuration')
             ->get();
               return view ('frontend.product.product_detail',compact('list_value','product','list_pro'));
       }
       //Chi tiết bài viết
    public function post_detail($post)
    { 
       $arg =[
        ['status','=','1'],
        ['id','!=',$post->id],
        ['type','=','post'],
        ['top_id','=',$post->top_id]
       ]; 
       $post_list = Post::where($arg)
       ->orderBy('created_at','desc')
       ->take(4)
       ->get();
      return view ('frontend.post.post-detail',compact('post','post_list'));
    }
    //chu đe bai viet
    public function post_topic($slug)
    {
        $topic = [
            ['status','=','1'],
            ['slug','=',$slug],
        ];
         $row_topic = Topic::where($topic)->first();
         $args =[
            ['status','=','1'],
            ['type','=','post'],
            ['top_id','=',$row_topic->id]
           ]; 
         $post_list = Post::where($args)->orderBy('created_at','desc')
         ->paginate(9);

      return view ('frontend.post.post-topic',compact('row_topic','post_list')); 
    }
     // Post_page
        public function post_page($slug)
        {
            $page =[
                ['status','=','1'],
                ['type','=','page'],
                ['slug','=',$slug],
               ]; 
          $post = Post::Where($page)->first();
          return view('frontend.post.post-page',compact('post'));
        }
    //Lỗi 404
        public function error_404($slug){
            return view('frontend.error_404');
        }
    // Tim kiếm
        public function timkiem(Request $req )
        {
            $listsp = Product::where("name", "like", "%".$req->key.'%')
           ->orWhere('price_buy',$req->key)
           ->get();
           return view('frontend.timkiem',compact('listsp'));
        }

    // Tất cả sản phẩm
    public function tatcasanpham(){
             echo 'Tất cả sản phẩm';
    }
    // Tất cả bài viết
}
