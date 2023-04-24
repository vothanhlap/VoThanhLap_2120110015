<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    #GET: admin/page , admin/page/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_page  = Page::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.page.index', compact('list_page','user_name'));
    }
    #GET: admin/page/create , admin/page/index
    public function create()
    {
        $user_name = Auth::user()->name;
        $list_page  = Page::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_page as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->title . '</option>';
        }
        return view('backend.page.create', compact('user_name','html_parent_id', 'html_sort_order'));
    }

    // thêm
    public function store(pageStoreRequest $request)
    {
        $user_name = Auth::user()->name;
        $page = new page();
        $page->title = $request->title;
        $page->slug = Str::slug($page->title = $request->title, '-');
        $page->metakey = $request->metakey;
        $page->metadesc = $request->metadesc;
        $page->detail = $request->detail;
        $page->parent_id = $request->parent_id;
        $page->sort_order = $request->sort_order;
        $page->type = 'page';
        $page->status = $request->status;
        $page->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $page->created_by = $user_name;
        //Upload file
        if ($request->has('image')) {
            $path_dir = "images/page"; // nơi lưu trữ
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
            $filename = $page->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
            $file->move($path_dir, $filename);

            $page->image = $filename;
        }
        // End upload
        if ($page->save()) {
            $link = new Link();
            $link->slug = $page->slug;
            $link->table_id = $page->id;
            $link->type = 'page';
            $link->save();
            return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Thêm mẫu tin thành công !']);
        } else
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm mẫu tin không thành công !']);
    }

    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $page = Page::find($id);
        if ($page == null) {
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            return view('backend.page.show', compact('page','user_name'));
        }
    }

    public function edit(string $id)
    {

        $user_name = Auth::user()->name;
        $page = Page::find($id);
        $list_page  = Page::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_page as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->title . '</option>';
        }
        return view('backend.page.edit', compact('user_name','page', 'html_parent_id', 'html_sort_order'));
    }

    public function update(pageUpdateRequest $request, $id)
    {
        $user_name = Auth::user()->name;
        $page = Page::find($id);
        $page->title = $request->title;
        $page->slug = Str::slug($page->title = $request->title, '-');
        $page->metakey = $request->metakey;
        $page->metadesc = $request->metadesc;
        $page->detail = $request->detail;
        $page->type = 'page';
        $page->parent_id = $request->parent_id;
        $page->sort_order = $request->sort_order;
        $page->status = $request->status;
        $page->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $page->updated_by = $user_name;
        // Upload file
        if ($request->has('image')) {
            $path_dir = "images/page/";
            if (File::exists(($path_dir . $page->image))) {
                File::delete(($path_dir . $page->image));
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
            $filename = $page->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
            $file->move($path_dir, $filename);
            $page->image = $filename;
        }
        //end upload file
        if ($page->save()) {
            $link = Link::where([['type', '=', 'page'], ['table_id', '=', $id]])->first();
            $link->slug = $page->slug;
            $link->save();
            return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Sửa mẫu tin thành công !']);
        } else
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Sửa mẫu tin không thành công !']);
    }

    #GET: admin/page/destroy/
    // Xóa hẳn
    public function destroy(string $id)
    {
        $user_name = Auth::user()->name;
        $page = Page::find($id);
        //thong tin hinh xoa
        $path_dir = "images/page/";
        $path_image_delete = $path_dir . $page->image;
        if ($page == null) {
            return redirect()->route('page.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($page->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
        }
        $link = Link::where([['type', '=', 'page'], ['table_id', '=', $id]])->first();
        $link->delete();
        return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin thành công !']);
    }

    #GET: admin/page/status/
    public function status($id)
    {
        $user_name = Auth::user()->name;
        $page = Page::find($id);
        if ($page == null) {
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
        $page->status = ($page->status == 1) ? 2 : 1;
        $page->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $page->updated_by = $user_name;
        $page->save();
        return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công !']);
    }

    #GET: admin/page/delete/
    // xóa vào thùng rác
    public function delete($id)
    {
        $user_name = Auth::user()->name;
        $page = Page::find($id);
        if ($page == null) {
            return redirect()->route('page.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $page->status = 0;
            $page->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $page->updated_by = $user_name;
            $page->save();
            return redirect()->route('page.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công !']);
        }
    }
    #GET:admin/page/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_page = Page::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.page.trash', compact('user_name','list_page'));
    }
    #GET: admin/page/restore/
    // Khôi phục
    public function restore($id)
    {
        $page = Page::find($id);
        if ($page == null) {
            return redirect()->route('page.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $page->status = 2;
            $page->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $page->updated_by = 1;
            $page->save();
            return redirect()->route('page.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công !']);
        }
    }
}
