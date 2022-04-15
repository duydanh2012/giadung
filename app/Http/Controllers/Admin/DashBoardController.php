<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Media;

class DashBoardController extends Controller
{
    public function index()
    {
        return view('admin.views.dashboard');
    }

    public function storeMedia(Request $request)
    {
        $image = $request->file('file');
        $profileImage = $image->getClientOriginalName();
        // Define upload path
        $destinationPath = public_path('/uploads/products/'); // upload path
        $image->move($destinationPath,$profileImage);
        
        // Save In Database
        $imagemodel= new Media();
        $imagemodel->name= $profileImage;
        $imagemodel->reference_id = $request->input('reference_id');
        $imagemodel->save();
        return response()->json(['success'=>$profileImage]);
    }

    public function destroy(Request $request)
    {
        $filename =  $request->get('filename');
        Media::where('name', $filename)->delete();
        $path=public_path('/uploads/products/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }
}
