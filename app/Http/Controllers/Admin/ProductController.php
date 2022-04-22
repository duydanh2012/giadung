<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Trademark;
use App\Models\Type;
use App\FileHelper;
use App\Models\Media;

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
        $trademarks = Trademark::orderBy('name', 'asc')->get();

        return view('admin.views.product.form')->with(compact('types', 'trademarks'));
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

        $media = Media::where('reference_id', $request->input('reference_id'))->update([
            'reference_id'   => $product->id,
            'reference_type' =>  get_class($product),
        ]);

        $types = $request->input('type');
        if(!empty($types) && is_array($types)){
            $product->types()->sync($types);
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
        $media = Media::where('reference_id', $id)->where('reference_type', get_class($data))->get();
        $types = Type::orderBy('name', 'asc')->get();
        $trademarks = Trademark::orderBy('name', 'asc')->get();

        return view('admin.views.product.form')->with(compact('types', 'trademarks', 'data', 'media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\odel  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $product = Product::find($id);

        if($request->input('hot')){
            $data['hot'] = 1;
        }

        if($request->input('new')){
            $data['new'] = 1;
        }

        if($request->hasFile('thumbnail')){
            $img_file_name = FileHelper::saveImage($request->file('thumbnail'), 'uploads/products');

            if($product->thumbnail){
                unlink($product->thumbnail);
            }

            $data['thumbnail'] = $img_file_name;
        }

        $product->fill($data);
        $product->save();

        if(!empty($request->input('type')) && is_array($request->input('type'))){
            $product->types()->sync($request->input('type'));
        }

        return redirect(route('product.index'))->with('alert_success', 'Sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\odel  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink($product->thumbnail);

        $product->types()->sync([]);
        $media = Media::where([
            'reference_id' => $id,
            'reference_type' => get_class($product),
        ])->get();

        if($media->count() > 0){
            foreach ($media as $item) {
                $path= public_path('/uploads/products/').$item->name;
    
                if (file_exists($path)) {
                    unlink($path);
                }
    
                Media::find($item->id)->delete();
            }
        }
       
        $product->delete();

        return redirect(route('product.index'))->with('alert_success', 'Xóa thành công!');
    }
}
