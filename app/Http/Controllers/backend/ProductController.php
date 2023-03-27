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

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;


class ProductController extends Controller
{
    #GET:admin/product, admin/product/index
    public function index()
    {
        $list_product = Product::join('vtl_product_image', 'vtl_product_image.product_id', '=', 'vtl_product.id')->where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.index', compact('list_product'));
    }
    #GET:admin/product/trash
    public function trash()
    {
        $list_product = Product::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.product.trash', compact('list_product'));
    }

    #GET: admin/product/create
    public function create()
    {
        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();

        $html_category_id = '';
        foreach ($list_category as $item) {
            $html_category_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        $html_brand_id = '';
        foreach ($list_brand as $item) {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.product.create', compact('html_category_id', 'html_brand_id'));
    }


    public function store(ProductStoreRequest $request)
    {
        $product = new Product; //tạo mới mẫu tin
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->price_buy = $request->price_buy;
        $product->detail = $request->detail;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = 1;
        $product->status = $request->status;

        // // Kiểm tra xem người dùng có upload hình ảnh Đại diện hay không?
        // if ($request->hasFile('avatar')) {
        //     $file = $request->avatar;

        //     // Lưu tên hình vào column sp_hinh
        //     $product->avatar = $file->getClientOriginalName();

        //     // Chép file vào thư mục "storate/public/images/product/"
        //     $fileSaved = $file->storeAs('public/images/product', $product->avatar);
        // }
        // if ($product->save()) {
        //     // Lưu hình ảnh liên quan
        //     if ($request->hasFile('image')) {
        //         $files = $request->image;

        //         // duyệt từng ảnh và thực hiện lưu
        //         foreach ($request->image as $index => $file) {

        //             $file->storeAs('public/images/product', $file->getClientOriginalName());

        //             // Tạo đối tưọng HinhAnh
        //             $image = new ProductImage();
        //             $image->product_id = $product->id;
        //             $image->id = ($index + 1);
        //             $image->image = $file->getClientOriginalName();
        //             $image->save();
        //         }
        //     }
        //     //khuyến mãi
        //     if (strlen($request->price_sale) && strlen($request->date_begin) && strlen($request->date_end)) {
        //         $product_sale = new ProductSale();
        //         $product_sale->product_id = $product->id;
        //         $product_sale->price_sale = $request->price_sale;
        //         $product_sale->date_begin = $request->date_begin;
        //         $product_sale->date_end = $request->date_end;
        //         $product_sale->save();
        //     }
        //     //Nhập kho
        //     if (strlen($request->price) && strlen($request->qty)) {
        //         $product_store = new ProductStore();
        //         $product_store->product_id = $product->id;
        //         $product_store->price = $request->price;
        //         $product_store->qty = $request->qty;
        //         $product_store->created_at = date('Y-m-d H:i:s');
        //         $product_store->created_by = 1;
        //         $product_store->save();
        //     }
        // }


        // //upload avatar
        // if ($request->has('avatar')) {
        //     $path_dir = "public/images/product/";
        //     $avatar =  $request->file('avatar');
        //     $ext = $avatar->getClientOriginalExtension();
        //     $avatarname = $product->slug . '-avatar-' . '.' . $ext;
        //     $avatar->move($path_dir, $avatarname);
        //     $product->image = $avatarname;
        // }
        if ($product->save()) {
            //upload image nhieu anh
            if ($request->has('image')) {
                $path_dir = "public/images/product/";
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
            //khuyến mãi
            if (strlen($request->price_sale) && strlen($request->date_begin) && strlen($request->date_end)) {
                $product_sale = new ProductSale();
                $product_sale->product_id = $product->id;
                $product_sale->price_sale = $request->price_sale;
                $product_sale->date_begin = $request->date_begin;
                $product_sale->date_end = $request->date_end;
                $product_sale->save();
            }
            //Nhập kho
            if (strlen($request->price) && strlen($request->qty)) {
                $product_store = new ProductStore();
                $product_store->product_id = $product->id;
                $product_store->price = $request->price;
                $product_store->qty = $request->qty;
                $product_store->created_at = date('Y-m-d H:i:s');
                $product_store->created_by = 1;
                $product_store->save();
            }
        }
        return redirect()->route('product.index')->with('message', ['type' => 'dangers', 'msg' => 'Thêm sản phẩm không thành công!']);
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.product.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        $list_product = Product::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_product as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.product.edit', compact('product', 'html_parent_id', 'html_sort_order'));
    }

    public function update(ProductUpdateRequest $request, string $id)
    {
        $product = Product::find($id); //lấy mẫu tin
        $product->name = $request->name;
        $product->slug = Str::slug($product->name = $request->name, '-');
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        $product->parent_id = $request->parent_id;
        $product->sort_order = $request->sort_order;
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->created_by = 1;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/product/";
            if (File::exists(public_path($path_dir . $product->image))) {
                File::delete(public_path($path_dir . $product->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $product->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $product->image = $filename;
        }
        //end upload
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'dangers', 'msg' => 'Cập nhật sản phẩm không thành công!']);
    }

    #GET:admin/product/destroy/{id}
    public function destroy(string $id)
    {
        $product = Product::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/product/";
        $path_image_delete = $path_dir . $product->image;
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($product->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa sản phẩm thành công!']);
        }
        return redirect()->route('product.trash')->with('message', ['type' => 'dangers', 'msg' => 'Xóa sản phẩm không thành công!']);
    }
    #GET:admin/product/status/{id}
    public function status($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/product/delete/{id}
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/product/restore/{id}
    public function restore($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = 1;
        $product->save();
        return redirect()->route('product.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
