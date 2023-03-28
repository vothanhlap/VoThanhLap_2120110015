<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function getlogin(){
      return view ('backend.auth.login');
    }

    function xuly(Request $request){
          $username = $request ->username;
          $password = $request ->password;
          if(Auth::attempt(['email' => $username, 'password' => $password])){
           
            echo 'thanh cong';
          }
          else
          {
            echo ' khong thanh cong';
          }
    }
}
