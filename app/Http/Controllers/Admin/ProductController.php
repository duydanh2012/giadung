<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Trademark;
use App\Models\Type;
use App\FileHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Product::with('trademark')->get();

        return view('admin.views.product.list')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();
        $colors = Color::orderBy('name', 'asc')->get();
        $trademarks = Trademark::orderBy('name', 'asc')->get();

        return view('admin.views.product.form')->with(compact('types', 'colors', 'trademarks'));
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

        $data['images'] = json_encode($request->input('images'));

        if($request->input('hot')){
            $data['hot'] = 1;
        }

        if($request->input('new')){
            $data['new'] = 1;
        }

        if($request->hasFile('thumbnail')){
            $img_file_name = FileHelper::saveImage($request->file('thumbnail'), 'uploads/products');

            $data['thumbnail'] = $img_file_name;
        }else{
            $data['thumbnail'] = '';
        }
        
        $data['code'] = $request->input('trademark_id') . $request->input('color') . uniqid();

        

        $product = Product::create($data);

        $types = $request->input('type');
        if(!empty($types) && is_array($types)){
            $product->types()->sync($types);
        }

        foreach ($request->input('images', []) as $file) {
            $product->addMedia(public_path('uploads/products/' . $file))->toMediaCollection('images');
        }

        return redirect(route('product.index'))->with('alert_success', 'Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\odel  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::with('types')->find($id);

        $types = Type::orderBy('name', 'asc')->get();
        $colors = Color::orderBy('name', 'asc')->get();
        $trademarks = Trademark::orderBy('name', 'asc')->get();

        return view('admin.views.product.form')->with(compact('types', 'colors', 'trademarks', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\odel  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\odel  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
