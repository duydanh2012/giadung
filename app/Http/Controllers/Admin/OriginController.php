<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Origin;
use Illuminate\Support\Str;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Origin::all();

        return view('admin.views.origin.list')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.origin.form');
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

        $checkSlug = Origin::where('slug', $data['slug'])->count();

        if($checkSlug){
            $data['slug'] =  $data['slug'] . '-' . strtotime(now());
        }

        Origin::create($data);

        return redirect(route('origin.index'))->with('alert_success', 'Thêm xuất xứ thành công!');
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
        $data = Origin::find($id);

        return view('admin.views.origin.form')->with(compact('data'));
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
        $data = Origin::find($id);

        $inputOrigin = $request->input();
        $inputOrigin['slug'] = Str::slug($request->input('name'));

        $checkSlug = Origin::where('slug', $inputOrigin['slug'])->count();

        if($checkSlug){
            $inputOrigin['slug'] =  $inputOrigin['slug'] . '-' . strtotime(now());
        }

        $data->fill($inputOrigin);
        $data->save();

        return redirect(route('origin.index'))->with('alert_success', 'Sửa xuất xứ thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Origin::destroy($id);

        return redirect(route('origin.index'))->with('alert_success', 'Xóa thương hiệu thành công!');
    }
}
