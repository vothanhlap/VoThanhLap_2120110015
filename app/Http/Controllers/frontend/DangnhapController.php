<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Customer;
use Mail;
use Str;


class DangnhapController extends Controller
{
   

    public function dangnhap()
    {
        return view ('frontend.login.dangnhap');
    }
    public function xulydangnhap(Request $request)
    {
        
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:3|max:32',       
       ],[                
             'password.required'=>'Bạn chưa nhập mật khẩu',
             'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
             'password.max'=>'Mật khẩu tối đa 32 kí tự',
             'username.required'=>'Bạn chưa nhập tên tài khoản',
       ]);

            $username =$request->username;
          $password = $request->password;     
          {
            $data=['username'=>$username,'password'=>$password];
          }     
          if(Auth::guard('customer')->attempt($data)){
            return redirect()->route('frontend.home')->with('message', ['type' => 'success', 'msg' => 'Đăng nhập tài khoản thành công!']);
          }
          else{
            return redirect()->route('login.dangnhap');
          //  echo bcrypt($password);
          }
    }

    public function dangxuat(){
            Auth::guard('customer')->logout(); 
            return redirect()->route('frontend.home');
           
    }

    public function dangki()
    {
        
        return view ('frontend.login.dangky');
    }

    public function xulydangki(Request $request)
    {
        $this->validate($request,[
            'fullname'=>'required|min:3',
            'phone'=>'required',
            'checkbox'=>'required',
            'address'=>'required',
            'username'=>'required',
            'email'=>'required|email|unique:vtl_user,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password',
        ],[
            'fullname.required'=>'Bạn chưa nhập tên người dùng',
            'checkbox.required'=>'Bạn chưa xác nhận thông tin',
            'fullname.min'=>'Tên người dùng ít nhất phải 3 kí tự',
            'email.required'=>'Bạn chưa nhập địa chỉ email',
            'email.email'=>'Bạn chưa nhập địa chỉ email không đúng dạng',
            'email.unique'=>'Địa chỉ email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu tối đa 32 kí tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'username.required'=>'Bạn chưa nhập tên tài khoản',
            'passwordAgain.same'=>'Mật khẩu không khớp',
                ]);
                $customer = new Customer;
                $customer->fullname = $request->fullname;
                $customer->username = $request->username;
                $customer->email = $request->email;
                $customer->password = bcrypt($request->password);
                $customer->address = $request->address;
                $customer->phone = $request->phone;
                $customer->roles = 2;
                $customer->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
                $customer->created_by ='admin'; 
                $customer->status = 1; 
                //  var_dump($customer);
                $customer->save();    
                return redirect()->route('login.dangnhap');  
    }
  
}