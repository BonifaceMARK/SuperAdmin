<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FixedAssetPayment;
use App\Models\AdminPayment;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\FreightPayment;
use App\Models\PaymentGateway;
use App\Models\TaxPayment;
use App\Models\ApInvoice;
use App\Models\ApFee;

class fms7Controller extends Controller
{
    public function fms7index()
    {
        $paymentGateways = PaymentGateway::all();
        $payments = FixedAssetPayment::all();
       return view ('F7.index', compact('payments','paymentGateways'));
    }


}
