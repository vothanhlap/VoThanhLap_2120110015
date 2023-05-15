<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductSale;
use App\Models\ProductOption;
use App\Models\ProductValue;
use App\Models\ProductStore;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Carbon\Carbon;


class ProductController extends Controller
{
    #GET:admin/product, admin/product/index
    public function index()
    {
        $user_name = Auth::user()->name;
         
        $list_product = Product::
         join('vtl_brand','vtl_brand.id','=','vtl_product.brand_id')
        ->join('vtl_category','vtl_category.id','=','vtl_product.category_id')
        ->select('vtl_product.*','vtl_brand.name as braname','vtl_category.name as catname')
         -> where('vtl_product.status', '!=', 0)
        ->orderBy('vtl_product.created_at', 'desc')
        ->get();
       
        return view('backend.product.index', compact('user_name','list_product'));
    }

    #GET:admin/product/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_product = Product::
        join('vtl_brand','vtl_brand.id','=','vtl_product.brand_id')
        ->join('vtl_category','vtl_category.id','=','vtl_product.category_id')
        ->select('vtl_product.*', 'vtl_brand.name as braname', 'vtl_category.name as catname')
        ->where('vtl_product.status', '=', 0)
        ->orderBy('vtl_product.created_at', 'desc')->get();
        return view('backend.product.trash', compact('user_name','list_product'));
    }

    #GET: admin/product/create
    public function create()
    {
        $user_name = Auth::user()->name;
        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_category_id = '';
        $html_brand_id = '';
        foreach ($list_category as $item) {
            $html_category_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        foreach ($list_brand as $item) {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.product.create', compact('user_name','html_category_id', 'html_brand_id'));
    }


    public function store(ProductStoreRequest $request)
    {
        $user_name = Auth::user()->name;
        $product = new Product; //tạo mới mẫu tin
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->number = $request->number;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->price_buy = $request->price_buy;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $product->created_by = $user_name;
        $product->status = $request->status;
            if ($product->save()) {
                //upload image nhieu anh
                if ($request->has('image')) {
                    $path_dir = "images/product/";
                    $array_file =  $request->file('image');
                    $i = 1;
                    foreach ($array_file as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $filename = $product->slug . "-" . $i . '.' . $extension;
                        $file->move($path_dir, $filename);
                        //echo $filename;
                        $product_image = new ProductImage();
                        $product_image->product_id = $product->id;
                        $product_image->image = $filename;
                        $product_image->save();
                        $i++;
                    }
                }
        
       
            //Nhập kho
            if (strlen($request->price_buy) && strlen($request->qty)) {
                $product_store = new ProductStore();
                $product_store->product_id = $product->id;
                $product_store->price_buy = $request->price_buy;
                $product_store->qty = $request->qty;
                $product_store->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
                $product_store->created_by = $user_name;
                $product_store->save();
            }

            //khuyến mãi
            if (strlen($request->price_sale) && strlen($request->date_begin) && strlen($request->date_end)) {
                $product_sale = new ProductSale();
                $product_sale->product_id = $product->id;
                $product_sale->price_sale = $request->price_sale;
                $product_sale->date_begin = $request->date_begin;
                $product_sale->date_end = $request->date_end;
                $product_sale->save();
            }
            //Thuộc tính
            if(strlen($request->namevalue)){
                $product_value = new ProductValue();
                $product_value->product_id = $product->id;
                $product_value->namevalue = $request->namevalue;
                $product_value->value = $request->giatri;
                $product_value->save();
            }
           return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thêm sản phẩm thành công!']);
    
        }
        return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm sản phẩm không thành công!']);
    }
   
   

    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.product.show', compact('user_name','product'));
    }

    public function edit(string $id)
    {
        $user_name = Auth::user()->name;
        $product = Product::find($id);
        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();
        $html_brand_id = '';
        $html_category_id = '';
        foreach ($list_category as $item) {
            $html_category_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        foreach ($list_brand as $item) {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.product.edit', compact('product','user_name', 'html_brand_id', 'html_category_id'));
    }

    public function update(ProductUpdateRequest $request, string $id)
    {
        $user_name = Auth::user()->name;
        $product = Product::find($id); //lấy mẫu tin
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->price_buy = $request->price_buy;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $product->updated_by = $user_name;
        $product->status = $request->status;
        if ($product->save()) {
            //upload image nhieu anh
            if ($request->has('image')) {
                $path_dir = "images/product/";
                $array_file =  $request->file('image');
                $i = 1;
                foreach ($array_file as $file) {
                    
        
                    $extension = $file->getClientOriginalExtension();
                    $filename = $product->slug . "-" . $i . '.' . $extension;
                    $file->move($path_dir, $filename);
                    //echo $filename;
                    $product = ProductImage::find($id); //lấy mẫu tin`
                    $product_image->product_id = $product->id;
                    $product_image->image = $filename;
                    $product_image->save();
                    $i++;
                }
            }
        }
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật sản phẩm thành công!']);       
    }

    #GET:admin/product/destroy/{id}
    public function destroy(string $id)
    {
        $user_name = Auth::user()->name;
        $product = Product::find($id);
        $path_dir = "images/product/";
        }
    #GET:admin/product/status/{id}
    public function status($id)
    {
        $user_name = Auth::user()->name;
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $product->updated_by = $user_name;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/product/delete/{id}
    public function delete($id)
    {
        $user_name = Auth::user()->name;
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $product->status = 0;
        $product->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $product->updated_by = $user_name;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/product/restore/{id}
    public function restore($id)
    {
        $user_name = Auth::user()->name;
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = 2;
        $product->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $product->updated_by = $user_name;
        $product->save();
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
