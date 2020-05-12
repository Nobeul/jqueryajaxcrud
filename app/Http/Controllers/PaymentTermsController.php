<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentTerm;

class PaymentTermsController extends Controller
{
    public function index(){
        $data['paymentTerm'] = PaymentTerm::get();
        return view('finance.paymentsTerms',$data);
    }
    public function savePaymentTerm(Request $request){
        $paymentTerm = New PaymentTerm;
        $paymentTerm->term_name = $request->term_name;
        $paymentTerm->due_day = $request->due_day;
        $paymentTerm->is_default = $request->is_default;
        $paymentTerm->save();
        return back();
    }
    public function editPayment(Request $request){
        $paymentTerm = PaymentTerm::find($request->id);
        return $paymentTerm;
    }

    public function updatePayment(Request $request){
        $paymentTerm = PaymentTerm::find($request->id);
        $paymentTerm->term_name = $request->term_name;
        $paymentTerm->due_day = $request->due_day;
        $paymentTerm->is_default = $request->is_default;
        $paymentTerm->save();

        return back();
    }
    public function deletepaymentTerm(Request $request){
        $paymentTerm = PaymentTerm::find($request->id);
        $paymentTerm->delete();
        return back();
    }
}
