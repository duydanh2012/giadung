<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\FileHelper;
use App\Http\Requests\ChangePassRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();

        return view('admin.views.user.list')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $data['role_id'] = 1;

        if($request->hasFile('avatar')){
            $imgFileName = FileHelper::saveImage($request->file('avatar'), 'uploads/users');

            $data['avatar'] = $imgFileName;
        }

        User::create($data);

        return redirect(route('user.index'))->with('alert_success', 'Thêm quản trị viên thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);

        return view('admin.views.user.form')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

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

        return redirect(route('user.index'))->with('alert_success', 'Chỉnh sửa người dùng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('user.index'))->with('alert_success', 'Xóa thành công!');
    }

    public function changePass()
    {
        return view('admin.views.user.changepass');
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
}
