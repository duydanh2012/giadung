<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    public function cartList()
    {
        $data = \Cart::getContent();

        return view('public.views.cart', compact('data'));
    }

    public function addToCart(Request $request)
    {
        // dd($request->input('code'));
        $product = Product::where('code', $request->input('code'))->first();

        \Cart::add([
            'id'   => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->input('quantity') ? $request->input('quantity') : 1,
            'attributes' => array(
                'thumbnail' => $product->thumbnail,
                'code' => $product->code,
            )
        ]);
        // session()->flash('success', 'Product is Added to Cart Successfully !');

        return response()->json($product, Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $product = Product::where('code', $request->input('code'))->first();

        \Cart::update(
            $product->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->input('quantity')
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return response()->json($product, Response::HTTP_OK);
    }

    public function delete(Request $request)
    {
        $product = Product::where('code', $request->input('code'))->first();

        \Cart::remove($product->id);

        session()->flash('success', 'Item Cart Remove Successfully !');

        return response()->json($product, Response::HTTP_OK);
    }

    public function clear()
    {
        \Cart::clear();

        return response()->json(Response::HTTP_OK);
    }
}
