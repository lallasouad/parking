<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function showPaymentForm()
    {
        return view('payment');
    }
    public function processPayment(Request $request)
    {
        $stripe = new \Stripe\StripeClient('STRIPE_SECRET');

        try {
            Charge::create([
                'amount' => 1000, // Amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test Payment',
            ]);

            // Payment successful; store a success message in the session
        

            return view('reserver');
        } catch (\Exception $e) {
            // Payment failed; store an error message in the session
            $request->session()->flash('error', $e->getMessage());

            return redirect()->route('payment.failure');
        }
    }
}
