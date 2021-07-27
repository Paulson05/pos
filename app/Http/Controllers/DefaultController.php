<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')->with('suppier', $supplier_id)->groupBy('category_id')->get();
//        dd($allCategory->toArray());
        return response()->json($allCategory);
    }

    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $allProduct = Product::where('category_id', $category_id)->get();
        return response()->json($allProduct);
    }
}
