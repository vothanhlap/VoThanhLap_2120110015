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


   public function postlogin(Request $request){
          $username =$request->username;
          $password = $request->password;
          $data=['name'=>$username,'password'=>$password];
          if(Auth::attempt($data)){

            echo 'Thanh cong';
            //return redirect()->route('admin.dashboard');
          }
          else{

            //echo 'That bai';
            echo bcryct($password);
           //return redirect('login');
          }
    }
}
