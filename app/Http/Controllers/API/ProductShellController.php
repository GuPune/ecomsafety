<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductShell;
use Illuminate\Http\Request;

class ProductShellController extends Controller
{
    //

    public function index()
    {

    $datas = Product::where('status','active')->get();
        return response()->json(['status' => '200',
        'data' => $datas],200);
    }

    public function cate()
    {

    $datas = Category::where('status','active')->get();
        return response()->json(['status' => '200',
        'data' => $datas],200);
    }


    public function group(Request $request)
    {

     $datas = ProductShell::where('group_shell_id',$request->id)->first();
     
    $dataarray = json_decode($datas->product_id);
 
    $productme = Product::whereIn('id',$dataarray)->get();
    $productNotme = Product::whereNotIn('id',$dataarray)->get();
 
    
        return response()->json(['status' => '200',
        'data' => $productme,'notme' => $productNotme],200);
    }


    public function productgroupsave(Request $request)
    {

   
       
if($request->select_product){
    $prodc = [];
    foreach($request->select_product as $key=>$value) {
      
        $prodc[] = $value['id'];
    }

}



 ProductShell::where('group_shell_id',$request->id)->update(['product_id'=>$prodc]);
    
 
    }
}
