<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    #GET: admin/user , admin/user/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_user  = User::where('status', '!=', 0)
       ->orderBy('created_at', 'desc')
       ->get();
        return view('backend.user.index', compact('list_user','user_name'));
    }
 #GET: admin/user , admin/user/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_user  = User::where('status', '=', 0)
       ->orderBy('created_at', 'desc')
       ->get();
        return view('backend.user.trash', compact('list_user','user_name'));
    }

    #GET: admin/user/status/
    public function status($id)
    {
        $user_name = Auth::user()->name;
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
        $user->status = ($user->status == 1) ? 2 : 1;
        $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $user->updated_by = $user_name;
        $user->save();
        return redirect()->route('user.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công !']);
    }

    #GET: admin/user/delete/
    // xóa vào thùng rác
    public function delete($id)
    {
        $user_name = Auth::user()->name;
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $user->status = 0;
            $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $user->updated_by = $user_name;
            $user->save();
            return redirect()->route('user.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công !']);
        }
    }

    #GET: admin/user/restore/
    // Khôi phục
    public function restore($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $user->status = 2;
            $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $user->updated_by = 1;
            $user->save();
            return redirect()->route('user.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công !']);
        }
    }

    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            return view('backend.user.show', compact('user','user_name'));
        }
    }
}
