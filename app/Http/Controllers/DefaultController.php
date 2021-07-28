<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getCategory(Request $request){
        $suppliers_id = $request->suppliers_id;
//        dd($suppliers_id);
        $allCategory = Product::with(['category'])->select('category_id')->where('suppliers_id', $suppliers_id)->groupBy('category_id')->get();
//        dd($allCategory);
        return response()->json($allCategory);
    }

    public function getProduct(Request $request){

        $category_id = $request->category_id;
        $allProduct = Product::where('category_id', $category_id)->get();

        return response()->json($allProduct);
    }
}
