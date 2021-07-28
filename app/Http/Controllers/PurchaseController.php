<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class PurchaseController extends Controller
{
    public function index(){
        return view('backend.pages.purchaseManagement');
    }
    public function purchaseList(){
        return view('backend.pages.purchase.view-pending-list');
    }

    public function store(Request $request)
    {
//        dd($request->all());

                if ($request->category_id == null){
                    return  redirect()->back()->with('error', 'sorry you did not select any item ');
                }
                else{
                    $count_category = count($request->category_id);
                    for ($i=0; $i <$count_category ; $i++){
                            $purchase = new Purchase();

                            $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                            $purchase->suppliers_id = $request->suppliers_id[$i];
                            $purchase->purchase_no = $request->purchase_no[$i];
                            $purchase->products_id = $request->products_id[$i];
                            $purchase->category_id = $request->category_id[$i];
                            $purchase->buying_qty = $request->buying_qty[$i];
                            $purchase->unit_price = $request->unit_price[$i];
                            $purchase->buying_price = $request->buying_price[$i];
                            $purchase->description = $request->buying_price[$i];

                            $purchase->status = '0';
                            //        $supplier->created_by = Auth::user()->id;
                            $purchase->save();

                    }
                }
              return redirect()->route('purchase-list');
    }

    public function pendingList(){
        $allData = Purchase::orderBy('date', 'desc')->orderby('id', 'desc')->where('status', '0')->get();
        return view('backend.pages.purchase.view-pending-list');
    }

    public function approve($id){
        $purchase = Purchase::find($id);
        $product =Product::where('id', $purchase->product_id)->first();
        $purchase_qty = ((float) ($purchase->buying_qty))+((float)($product->quanty));
        $product->quantity = $purchase_qty;
        if ($product->save()){
            DB::table('purchase')->where('id', $id)->update(['status' => 1]);
        }
    }
    public function  fetchProduct(){
        $products = Purchase::all();
        return response()->json([
            'products'=>$products,
        ]);
    }
}
