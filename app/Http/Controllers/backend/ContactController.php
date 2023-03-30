<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\contactStoreRequest;
use App\Http\Requests\contactUpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class   ContactController extends Controller
{
    #GET: admin/contact , admin/contact/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_contact  = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.index', compact('list_contact','user_name'));
    }
    #GET: admin/contact/create , admin/contact/index
    public function create()
    {
        $user_name = Auth::user()->name;
        $list_contact  = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_contact as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.contact.create', compact('html_parent_id', 'html_sort_order','user_name'));
    }

    // thêm
    public function store(ContactStoreRequest $request)
    {
        $user_name = Auth::user()->name;
        $contact = new contact();
        $contact->name = $request->name;
        $contact->slug = Str::slug($contact->name = $request->name, '-');
        $contact->metakey = $request->metakey;
        $contact->metadesc = $request->metadesc;
        $contact->parent_id = $request->parent_id;
        $contact->sort_order = $request->sort_order;
        $contact->status = $request->status;
        $contact->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $contact->created_by = $user_name;
        //Upload file
        if ($request->has('image')) {
            $path_dir = "images/contact"; // nơi lưu trữ
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
            $filename = $contact->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
            $file->move($path_dir, $filename);

            $contact->image = $filename;
        }
        // End upload
        if ($contact->save()) {
            $link = new Link();
            $link->slug = $contact->slug;
            $link->table_id = $contact->id;
            $link->type = 'contact';
            $link->save();
            return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Thêm mẫu tin thành công !']);
        } else
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm mẫu tin không thành công !']);
    }

    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            return view('backend.contact.show', compact('contact','user_name'));
        }
    }

    public function edit(string $id)
    {
        $user_name = Auth::user()->name;
        $contact = Contact::find($id);
        $list_contact  = Contact::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $html_parent_id = '';
        $html_sort_order = '';
        foreach ($list_contact as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.contact.edit', compact('contact','user_name', 'html_parent_id', 'html_sort_order'));
    }

    public function update( ContactUpdateRequest $request, $id)
    {
        $user_name = Auth::user()->name;
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->slug = Str::slug($contact->name = $request->name, '-');
        $contact->metakey = $request->metakey;
        $contact->metadesc = $request->metadesc;
        $contact->parent_id = $request->parent_id;
        $contact->sort_order = $request->sort_order;
        $contact->status = $request->status;
        $contact->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $contact->updated_by = $user_name;
        // Upload file
        if ($request->has('image')) {
            $path_dir = "images/contact/";
            if (File::exists(($path_dir . $contact->image))) {
                File::delete(($path_dir . $contact->image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
            $filename = $contact->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
            $file->move($path_dir, $filename);
            $contact->image = $filename;
        }
        //end upload file
        if ($contact->save()) {
            $link = Link::where([['type', '=', 'contact'], ['table_id', '=', $id]])->first();
            $link->slug = $contact->slug;
            $link->save();
            return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Sửa mẫu tin thành công !']);
        } else
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Sửa mẫu tin không thành công !']);
    }

    #GET: admin/contact/destroy/
    // Xóa hẳn
    public function destroy(string $id)
    {
        $user_name = Auth::user()->name;
        $contact = Contact::find($id);
        //thong tin hinh xoa
        $path_dir = "images/contact/";
        $path_image_delete = $path_dir . $contact->image;
        if ($contact == null) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($contact->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
        }
        $link = Link::where([['type', '=', 'contact'], ['table_id', '=', $id]])->first();
        $link->delete();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin thành công !']);
    }

    #GET: admin/contact/status/
    public function status($id)
    {
        $user_name = Auth::user()->name;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
        $contact->status = ($contact->status == 1) ? 2 : 1;
        $contact->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $contact->updated_by = $user_name;
        $contact->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công !']);
    }

    #GET: admin/contact/delete/
    // xóa vào thùng rác
    public function delete($id)
    {
        $user_name = Auth::user()->name;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $contact->status = 0;
            $contact->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $contact->updated_by = $user_name;
            $contact->save();
            return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công !']);
        }
    }
    #GET:admin/contact/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_contact = Contact::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.trash', compact('list_contact','user_name'));
    }
    #GET: admin/contact/restore/
    // Khôi phục
    public function restore($id)
    {
        $user_name = Auth::user()->name;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $contact->status = 2;
            $contact->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $contact->updated_by = $user_name;
            $contact->save();
            return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công !']);
        }
    }
}
