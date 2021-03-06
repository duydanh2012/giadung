<?php

use App\Models\Origin;
use App\Models\Type;
use App\Models\Product;
use App\Models\Trademark;

if (!function_exists('getTypes')) {
    function getTypes(int $limit = 10)
    {
        $data = Type::limit($limit)
                    ->get();
        
        return $data;                
    }
}

if (!function_exists('getTrademarks')) {
    function getTrademarks(int $limit = 10)
    {
        $data = Trademark::limit($limit)
                    ->get();
        
        return $data;                
    }
}

if (!function_exists('getOrigins')) {
    function getOrigins(int $limit = 10)
    {
        $data = Origin::limit($limit)
                    ->get();
        
        return $data;                
    }
}

if (!function_exists('getFeatures')) {
    function getFeatures(int $limit = 6)
    {
        $data = Product::where('hot', 1)
                     ->where('quantity', '>', '0')
                     ->limit($limit)
                     ->get();
        
        return $data;                
    }
}

if (!function_exists('getProductWithTrademark')) {
    function getProductWithTrademark()
    {
        $data = Trademark::with('products')->get();
        
        return $data;                
    }
}

if (!function_exists('getProductNew')) {
    function getProductNew(int $limit = 6)
    {
        $data = Product::where('new', 1)->where('quantity', '>', '0')->limit($limit)->get();
        
        return $data;                
    }
}

if (!function_exists('getProductRelase')) {
    function getProductRelase($code, int $limit = 4)
    {
        $product = Product::where('code', $code)->first()->trademark_id;

        $data = Product::where('trademark_id', $product)->where('quantity', '>', '0')->get();
        
        return $data;                
    }
}

if (!function_exists('getAllProduct')) {
    function getAllProduct(int $pagina = 9)
    {
        $data = Product::where('quantity', '>', '0')->paginate($pagina);
        
        return $data;                
    }
}
