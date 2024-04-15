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
use App\Models\Transactionhistory;
use App\Models\Transaction;
class fms4Controller extends Controller
{
    public function fms4index()
    {
        $freightPayments = FreightPayment::all();
        $paymentGateways = PaymentGateway::all();
        $payments = FixedAssetPayment::all();
        $f10 = Transaction::all();
        
        $arInvoiceTotalAmounts = ArInvoiceTotalAmount::all();
        $invoiceCustomerNames = InvoiceCustomerName::all();
        $invoicePaymentDetails = InvoicePaymentDetail::all();
        $fixedAssetPayments = FixedAssetPayment::all();
        $invoiceDetails = InvoiceDetail::all();
        $taxPayments = TaxPayment::all();
        $transach = Transactionhistory::all();
        

        $taxPayments = TaxPayment::all();
        $fixedAssetPayments = FixedAssetPayment::all();
        $payments = $taxPayments->merge($fixedAssetPayments);
        return view('F4.index', compact('payments','freightPayments','f10','transach','fixedAssetPayments','payments','paymentGateways','taxPayments','invoicePaymentDetails','arInvoiceTotalAmounts','invoiceDetails','invoiceCustomerNames'));
    }

}
