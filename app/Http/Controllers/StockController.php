<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stockReport(){
        $products = Product::orderBy('suppliers_id', 'asc')->orderBy('category_id', 'asc')->get();
        return view('backend.pages.stock.index')->with([
            'products' => $products,
        ]);
    }
    public function StockReportPdf(){
        $data['products'] =  Product::orderBy('suppliers_id', 'asc')->orderBy('category_id', 'asc')->get();
        $pdf = \PDF::loadView('backend.pages.pdf.stockreportpdf',$data);
        return $pdf->stream('invoice.pdf');
    }

    public  function supplierProductWiseReport(){
        return view('backend.pages.stock.supplier-product-wise');
    }
public  function supplierProductWiseReportPdf(Request $request){
    $data['products'] =  Product::orderBy('suppliers_id', 'asc')->orderBy('category_id', 'asc')->where('suppliers_id',$request->suppliers_id)->get();
    $pdf = \PDF::loadView('backend.pages.pdf.supplierwisestockreportpdf',$data);
    return $pdf->stream('invoice.pdf');
}
}
