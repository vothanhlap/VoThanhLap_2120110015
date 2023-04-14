<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Customer;
use Mail;


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
      $data=['username'=>$username,'password'=>$password];
        if(Auth::attempt($data)){
        //echo 'Thanh cong';
        return redirect()->route('frontend.home');
        }
        else{
            return redirect()->route('login.dangnhap');
        }
    }
    public function dangki()
    {
        return view ('frontend.login.dangki');
    }

    public function xulydangki(Request $request)
    {
        $this->validate($request,[
             'fullname'=>'required|min:3',
             'phone'=>'required',
             'address'=>'required',
             'username'=>'required',
             'email'=>'required|email|unique:vtl_custumer,email',
             'password'=>'required|min:3|max:32',
             'passwordAgain'=>'required|same:password',
        ],[
              'fullname.required'=>'Bạn chưa nhập tên người dùng',
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

        $cus = new Customer;
        $cus->fullname = $request->fullname;
        $cus->username = $request->username;
        $cus->email = $request->email;
        $cus->password = bcrypt($request->password);
        $cus->address = $request->address;
        $cus->phone = $request->phone;
        $cus->geder = $request->geder;
        $cus->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $cus->created_by ='admin';  
        $cus->save();
        return redirect()->route('login.dangki')->with('message', ['type' => 'success', 'msg' => 'Đăng kí tài khoản thành công!']);
    }
   

    public function khoiphucmatkhau()
    {
        return view ('frontend.login.khoiphucmatkhau');
    }
    public function postkhoiphucmatkhau(Request $req)
    {
        $req->validate([
             'email'=>'required'

        ],[
               'email.required'=>'Vui lòng nhập địa chỉ email',
               
        ]);
        $customer = Customer::where('email',req->email)->first();
            Mail::send('frontend.emails.check_mail_forgot',compact('customer'),function($email) use($customer){
                $email->subject('Laptopvui.com - Lấy lại mật khẩu');
                $email->to($customer->email,$customer->fullname);
                return redirect ('frontend.login.dangnhap')->with('message', ['type' => 'danger', 'msg' => 'Vui lòng check email để lại lại mật khẩu !']);
        });
    }
    // public function xulyyeucaumatkhaumoi()
    // {
        
    // }
    // public function postxulyyeucaumatkhaumoi(Request $request)
    // {
    //     echo 'Xu ly yeu cau';
    // }
}
