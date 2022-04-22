<?php

namespace App\Http\Controllers;

use App\FileHelper;
use App\Http\Requests\ChangePassRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::find(Auth::user()->id);

        return view('public.views.user.index')->with(compact('data'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $data = $request->input();
        if($request->hasFile('avatar')){
            $imgFileName = FileHelper::saveImage($request->file('avatar'), 'uploads/users');

            if($user->avatar){
                unlink($user->avatar);
            }

            $data['avatar'] = $imgFileName;
        }

        $user->fill($data);
        $user->save();

        return redirect(route('public.user.index'))->with('alert_success', 'Chỉnh sửa thông tin thành công thành công!');
    }

    public function changePass()
    {
        return view('public.views.user.change-pass');
    }

    public function postChangePass(ChangePassRequest $request)
    {
        if(Hash::check($request->input('password'), Auth::user()->password)) {
            if ($request->input('password') !== $request->input('password_new')) {
                User::find(Auth::user()->id)->update(['password'=> Hash::make($request->input('password_new'))]);

                return redirect()->back()->with('alert_success','Thay Đổi Mật Khẩu Thành Công!');
            }else {
                return redirect()->back()->with('alert_error','Mật Khẩu Mới Phải Khác Mật Khẩu Cũ !');
            }
        }else{
            return redirect()->back()->with('alert_error','Sai Mật Khẩu!');
        }
    }

    public function listOrdered()
    {
        $data  = Bill::where('user_id', Auth::user()->id)->paginate(10);

        return view('public.views.user.orders')->with(compact('data'));
    }

    public function detailBill($code)
    {
        $bill = Bill::where('code', $code)->first();

        $data = BillDetail::where('bill_id', $bill->id)->with('product')->get();

        return view('public.views.user.detail')->with(compact('data', 'bill'));
    }

    public function confirm($code)
    {
        $bill = Bill::where('code', $code)->first();

        $bill->update([
            'delivery_date' => now(),
        ]);

        return redirect(route('public.user.detailbill', $code));
    }
}
