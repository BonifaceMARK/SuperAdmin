<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoicePaymentDetail;
use App\Models\InvoiceDetail;
use App\Models\InvoiceCustomerName;
use App\Models\ArInvoiceTotalAmount;
class fms4Controller extends Controller
{
    public function fms4index()
    {
        $arInvoiceTotalAmounts = ArInvoiceTotalAmount::all();
        $invoiceCustomerNames = InvoiceCustomerName::all();
        $invoicePaymentDetails = InvoicePaymentDetail::all();
        $invoiceDetails = InvoiceDetail::all();
        return view('F4.index', compact('invoicePaymentDetails','arInvoiceTotalAmounts','invoiceDetails','invoiceCustomerNames'));
    }

}
