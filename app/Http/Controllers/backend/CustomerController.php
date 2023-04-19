<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Link;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    #GET: admin/user , admin/user/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_customer  = Customer::orderBy('created_at', 'desc')
       ->get();
        return view('backend.customer.index', compact('list_customer','user_name'));
    }
    #GET: admin/user/status/
    public function status($id)
    {
        $user_name = Auth::user()->name;
        $customer = Customer::find($id);
        if ($customer == null) {
            return redirect()->route('customer.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
        $customer->status = ($customer->status == 1) ? 2 : 1;
        $customer->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $customer->updated_by = $user_name;
        $customer->save();
        return redirect()->route('customer.index')->with('message', ['type' => 'success', 'msg' => 'Đã kích hoạt cho tài khoản khách hàng thành công !']);
    }

    #GET: admin/user/delete/
    // xóa mẫu tin
    public function destroy( string $id)
    {
        $user_name = Auth::user()->name;
        $customer = Customer::find($id);     
        if ($customer == null) {
            return redirect()->route('customer.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $customer->delete();
        return redirect()->route('customer.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin thành công !']);   
        }
    
    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $customer = Customer::find($id);
        if ($customer == null) {
            return redirect()->route('user.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            return view('backend.customer.show', compact('customer','user_name'));
        }
    }

    //Edit user
    public function edit(string $id)
    {
        $user_name = Auth::user()->name;
        $customer = Customer::find($id);
        $list_customer  = Customer::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.customer.edit', compact('customer','user_name'));
    }

    public function update( Request $request, $id)
    {
        $user_name = Auth::user()->name;
        $customer = Customer::find($id);
        if($customer == null){
            return redirect()->route('customer.index')->with('message', ['type' => 'danger', 'msg' => 'Sửa mẫu tin không thành công !']);
        }else
        {
            $customer->fullname = $request->fullname;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->geder = $request->geder;
            $customer->roles = $request->roles;
            $customer->status = $request->status;
            $customer->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $customer->updated_by = $user_name;
            $customer->save();
            return redirect()->route('customer.index')->with('message', ['type' => 'success', 'msg' => 'Sửa mẫu tin thành công !']);
        }
        
    }
}



