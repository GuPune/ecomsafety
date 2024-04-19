<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
}
