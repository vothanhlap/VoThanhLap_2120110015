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
    //     $this->validate($request,[
    //         'username'=>'required',
    //         'password'=>'required|min:3|max:32',
            
    //    ],[                
    //          'password.required'=>'Bạn chưa nhập mật khẩu',
    //          'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
    //          'password.max'=>'Mật khẩu tối đa 32 kí tự',
    //          'username.required'=>'Bạn chưa nhập tên tài khoản',
    //    ]);

    //    $username =$request->username;
    //    $password = $request->password;   
    //   $data=['username'=>$username,'password'=>$password];
    //    if(Auth::attempt($data)){
    //     //echo 'Thanh cong';
    //     //echo bcrypt($password);
    //     return redirect()->route('frontend.home');
    //    }else
    //    {
    //     //echo 'Khong Thanh cong';
    //     //echo bcrypt($password);
    //     return redirect()->route('login.dangnhap');
    //    }
    }

    public function dangxuat(){
        // if(Auth::check()){
        //     Auth::logout(); 
        //     return redirect()->route('login.dangnhap');
        // }
        // else
        // {
        //     return redirect()->route('login.dangnhap');
        // }      
    }
  
}
