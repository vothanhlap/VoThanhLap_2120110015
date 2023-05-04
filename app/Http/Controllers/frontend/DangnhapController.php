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
      
       if(Auth::guard('cus')->attempt($request->only('username','password'))){
        //echo 'Thanh cong';
        //echo bcrypt($password);
        return redirect()->route('frontend.home');
       }else
       {
        //echo 'Khong Thanh cong';
        //echo bcrypt($password);
       return redirect()->route('login.dangnhap');
       }
    }

    public function dangxuat(){
     
            Auth::guard('cus')->logout(); 
            return redirect()->route('login.dangnhap');
           
    }
  
}
