<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoicePaymentDetail;
use App\Models\InvoiceDetail;
use App\Models\InvoiceCustomerName;
use App\Models\ArInvoiceTotalAmount;
use App\Models\TaxPayment;
class fms4Controller extends Controller
{
    public function fms4index()
    {
        $arInvoiceTotalAmounts = ArInvoiceTotalAmount::all();
        $invoiceCustomerNames = InvoiceCustomerName::all();
        $invoicePaymentDetails = InvoicePaymentDetail::all();
        $invoiceDetails = InvoiceDetail::all();
        $taxPayments = TaxPayment::all();
        return view('F4.index', compact('taxPayments','invoicePaymentDetails','arInvoiceTotalAmounts','invoiceDetails','invoiceCustomerNames'));
    }

}
