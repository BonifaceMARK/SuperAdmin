<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoicePaymentDetail;
use App\Models\InvoiceDetail;
use App\Models\InvoiceCustomerName;
use App\Models\ArInvoiceTotalAmount;
use App\Models\TaxPayment;
use App\Models\FreightPayment;
use App\Models\PaymentGateway;
use App\Models\FixedAssetPayment;
class fms4Controller extends Controller
{
    public function fms4index()
    {
        $freightPayments = FreightPayment::all();
        $paymentGateways = PaymentGateway::all();
        $payments = FixedAssetPayment::all();
        $arInvoiceTotalAmounts = ArInvoiceTotalAmount::all();
        $invoiceCustomerNames = InvoiceCustomerName::all();
        $invoicePaymentDetails = InvoicePaymentDetail::all();
        $fixedAssetPayments = FixedAssetPayment::all();
        $invoiceDetails = InvoiceDetail::all();
        $taxPayments = TaxPayment::all();
        return view('F4.index', compact('freightPayments','fixedAssetPayments','payments','paymentGateways','taxPayments','invoicePaymentDetails','arInvoiceTotalAmounts','invoiceDetails','invoiceCustomerNames'));
    }

}
