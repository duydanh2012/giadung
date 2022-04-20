<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.views.homepage');
    }

    public function type($slug)
    {
        $datas = Type::where('slug', $slug)->get();

    }

    public function productDetail($code)
    {
        $data = Product::where('code', $code)
                        ->with('trademark', 'types')
                        ->first();               

        $medias = Media::where([
            'reference_id' => $data->id,
            'reference_type' => get_class($data),
        ])->get();

        return view('public.views.product-detail')->with(compact('data', 'medias'));
    }
}
