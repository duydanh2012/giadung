<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class DashBoardController extends Controller
{
    public function index()
    {
        $bills = Bill::with('user')->get();
        return view('admin.views.dashboard')->with(compact('bills'));
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

    public function detailBill($code)
    {
        $bill = Bill::where('code', $code)->with('user')->first();

        $data = BillDetail::where('bill_id', $bill->id)->with('product')->get();

        return view('admin.views.orders.detail')->with(compact('data', 'bill'));
    }

    public function statistical()
    {
        $data = Bill::select(
                                DB::raw('DATE(created_at) as date'),
                                DB::raw('count(*) as count'),
                            )
                    ->groupBy('date')->get()->toArray();

        return response()->json($data, Response::HTTP_OK);      
    }
}
