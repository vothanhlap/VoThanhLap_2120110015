<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function getlogin(){
      return view ('backend.auth.login');
    }
   public function postlogin(Request $request)
   {
        
          $username =$request->username;
          $password = $request->password;
          $data=['username'=>$username,'password'=>$password];
          if(Auth::attempt($data)){

            //echo 'Thanh cong';
            return redirect()->route('admin.dashboard')->with('message', ['type' => 'success', 'msg' => 'Đăng nhập tài khoản thành công!']);
          }
          else{
            return redirect('login');
           //echo 'That bai';
            // var_dump($data);
            // echo bcrypt($password);
          
          }
          
    }
    public function  logout(){
      if(Auth::check()){
        Auth::logout();
      }else
      {
        return redirect('login');
      }
    }
}
