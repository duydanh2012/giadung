<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trademark;
use Illuminate\Support\Str;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Trademark::all();

        return view('admin.views.trademark.list')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.trademark.form');
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
        $data['slug'] = Str::slug($request->input('name'));

        $checkSlug = Trademark::where('slug', $data['slug'])->count();

        if($checkSlug){
            $data['slug'] =  $data['slug'] . '-' . strtotime(now());
        }

        Trademark::create($data);

        return redirect(route('trademark.index'))->with('alert_success', 'Thêm thương hiệu thành công!');
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
        $data = Trademark::find($id);

        return view('admin.views.trademark.form')->with(compact('data'));
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
        $data = Trademark::find($id);

        $inputTrademark = $request->input();
        $inputTrademark['slug'] = Str::slug($request->input('name'));

        $checkSlug = Trademark::where('slug', $inputTrademark['slug'])->count();

        if($checkSlug){
            $inputTrademark['slug'] =  $inputTrademark['slug'] . '-' . strtotime(now());
        }

        $data->fill($inputTrademark);
        $data->save();

        return redirect(route('trademark.index'))->with('alert_success', 'Sửa thương hiệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trademark::destroy($id);

        return redirect(route('trademark.index'))->with('alert_success', 'Xóa thương hiệu thành công!');
    }
}
