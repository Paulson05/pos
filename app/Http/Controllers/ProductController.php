<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $products = Product::with(['category', 'unit', 'supplier'])->get();

        return view('backend.pages.product.index')->with([
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'suppliers_id'=>  'required',
            'units_id' => 'required',
            'categories_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }else{
            $product = new Product();
            $product->suppliers_id = $request->suppliers_id;
            $product->name = $request->name;
            $product->units_id = $request->units_id;
            $product->categories_id = $request->categories_id;
//        $supplier->created_by = Auth::user()->id;
            $product->save();

            return response()->json([
                'status' => 200,
                'message' => 'post added successfully',

            ]);
        }
    }
    public function  fetchProduct(){
        $products = Product::all();
        return response()->json([
            'products'=>$products,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }


    public function edit()
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product,

            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'product added succesfully',

            ]);
        }
    }


    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $post = Product::find($id);
        $post->delete();
        return response()->json([
            'status' => 200,
            'message' => 'post deleted successfully',

        ]);
    }
}
