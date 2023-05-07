<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
   public function getlogin(){
      return view ('backend.auth.login');
    }
   public function postlogin(Request $request)
   {

    $this->validate($request,[
      'username'=>'required|exists:vtl_user',
      'password'=>'required|min:3|max:32',
 ],[         
       'password.required'=>'Bạn chưa nhập mật khẩu',
       'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
       'password.max'=>'Mật khẩu tối đa 32 kí tự',
       'username.required'=>'Bạn chưa nhập tên tài khoản',
       'username.exists'=>'Tài khoản của bạn không tồn tại trong hệ thống',

 ]);
          $username =$request->username;
          $password = $request->password;     
          {
            $data=['username'=>$username,'password'=>$password];
          }     
          if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard')->with('message', ['type' => 'success', 'msg' => 'Đăng nhập tài khoản thành công!']);
          }
          else{
           return redirect('login');
          //  echo bcrypt($password);
          }
    }
    public function  logout(){
         if(Auth::check()){
             Auth::logout(); 
          return redirect('login');
         }
         else
         {
          return redirect('login');
         }
      }

      public function forgotpassword()
      {
        return view ('backend.auth.forgotpassword');
      }

      public function recover ()
      {
        return view ('backend.auth.recover  ');
      }

      public function getdangky(){

        return view ('backend.auth.dangky');
      }

      public function postdangky(Request $request){
        
          $this->validate($request,[
          'name'=>'required|min:3',
          'phone'=>'required',
          'address'=>'required',
          'username'=>'required',
          'email'=>'required|email|unique:vtl_custumer,email',
          'password'=>'required|min:3|max:32',
          'passwordAgain'=>'required|same:password',
      ],[
          'name.required'=>'Bạn chưa nhập tên người dùng',
          'name.min'=>'Tên người dùng ít nhất phải 3 kí tự',
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

              $user = new User;
              $user->name = $request->name;
              $user->username = $request->username;
              $user->email = $request->email;
              $user->password = bcrypt($request->password);
              $user->address = $request->address;
              $user->phone = $request->phone;
              $user->roles = 2;
              $user->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
              $user->created_by ='admin'; 
              $user->status = 1; 
              $user->save();
                    //var_dump($user);
              return redirect()->route('login')->with('message', ['type' => 'success', 'msg' => 'Đăng kí tài khoản thành công!']);
                }

      }
    
