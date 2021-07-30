<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        $invoice_data = invoice::orderBy('id', 'desc')->first();
        if ($invoice_data == null){
            $firstReg = '0';
            $data['invoice_no'] = $firstReg+1;
//         dd($invoice_no);

        }
        else{
            $invoice_data = invoice::orderBy('id', 'desc')->first()->invoice_no;

            $data['invoice_no'] = $invoice_data+1;
        }

        return view('backend.pages.invoice.index', $data);
    }
    public function invoiceList(){
        return view('backend.pages.invoice.invoice-list');
    }


}
