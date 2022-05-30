<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' =>$request->input('password')])) {

            if(Auth::user()->role_id == 0){
                return redirect(route('public.index'));
            }elseif(Auth::user()->role_id == 1){
                return redirect(route('admin.dashboard'));
            }
        }else {
            return redirect(route('login'))->with('alert_error','Sai Tài Khoản Hoặc Mật Khẩu!');
        }
    }

    public function forget()
    {
        return view('auth.foget');
    }

    public function postForget(Request $request)
    {
        $data = User::where('email', $request->email)->first();

        if($data){
            $data->password = rand(1000000,9999999);

            try {
                User::find($data->id)->update(['password'=> Hash::make($data->password)]);

                $datas = [
                    'password' => $data->password
                ];

                Mail::send('auth.sendEmailPass',$datas ,function($mail) use($data, $request){
                    $mail->from('abc2012199@gmail.com', 'Support ');
                    $mail->to($data->email, $data->name)->subject('Forget Pass');
                });

                return redirect()->back()->with('alert_success','Mật Khẩu Đã Gửi Đến Email Này!');
            } catch (\Throwable $th) {
                return redirect()->back()->with('alert_error',$th);
            }
        }else{
            return redirect()->back()->with('alert_error','Không Tìm Thấy Người Dùng Có Email Này!');
        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));

        User::create($data);

        return redirect(route('login'))->with('alert_success','Đăng ký thành công!');
    }

    public function logout()
    {
        if(Auth::check()){
            \Cart::clear();
            Auth::logout();
            return redirect(route('login'));
        }
        
        return redirect(route('public.index'));
    }
}
