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

}
