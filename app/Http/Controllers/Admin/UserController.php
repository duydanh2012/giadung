<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\FileHelper;

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
}
