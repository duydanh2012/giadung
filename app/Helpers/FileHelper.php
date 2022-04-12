<?php

namespace App;

use Illuminate\Support\Str;;

class FileHelper{
    public static function saveImage($img, string $folder = '')
    {
        if(!empty($img)){
            $img_file_extension = $img->getClientOriginalExtension();
            $img_file_name = $img->getClientOriginalName();
            $img_file_name = date("YmdHis", strtotime(now())) . Str::random(4) . '.' . $img_file_extension;
    
            $img->move($folder, $img_file_name);
            
            return $folder . '/' . $img_file_name;
        }else{
            return '';
        }
    }
}
