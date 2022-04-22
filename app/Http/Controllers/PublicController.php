<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.views.homepage');
    }

    public function listProduct()
    {
        return view('public.views.list');
    }

    public function type($slug)
    {
        $type = Type::where([
            'slug' => $slug
        ])->first();  

        $datas = Product::join('type_product', 'type_product.product_id', '=', 'products.id')
                            ->where([
                                'type_product.type_id' => $type->id
                            ])->paginate(9);
                                              
        return view('public.views.type')->with(compact('datas', 'type'));
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

    public function payment()
    {
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
        }else{
            $user = [];
        }

        return view('public.views.payment')->with(compact('user'));
    }

    public function postPayment(Request $request)
    {
        $data = $request->input();

        $data['code'] = date("dmyHis");  

        if(Auth::check()){
            $data['user_id'] = Auth::user()->id;
        }else{
            $data['user_id'] = 0;
        }

        $bill =  Bill::create($data);

        $carts = \Cart::getContent();

        foreach ($carts as $item) {
            BillDetail::create([
                'price' => $item->price,
                'product_id' => $item->id,
                'number' => $item->quantity,
                'bill_id' => $bill->id,
            ]);
        }

        \Cart::clear();

        return view('public.views.success');
    }

    public function search(Request $request)
    {
        $rq = $request->input('q');

        $product = Product::where('id', 'LIKE', '%' . $rq . '%')
                            ->orWhere('code', 'LIKE', '%' . $rq . '%')
                            ->orWhere('name', 'LIKE', '%' . $rq . '%')
                            ->paginate(9);

        return view('public.views.search')->with(compact('product'));                    
    }
}
