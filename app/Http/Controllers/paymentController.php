<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\address;
use App\Models\OfficeHour;

class paymentController extends Controller
{
    public function index($id)
    {
        $address = address::where('id', 1)->first();
        $officehours = OfficeHour::all();
        $payment_name = Payment::where('id', $id)->first();
        $payment = PaymentDetail::where('payment_id', $id)->get();
        return view('landingpage.payment.index', compact('payment_name', 'payment', 'address', 'officehours'));
    }
}
