<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class StripeController  extends Controller
{
    public function checkout()
    {
        return view('index');
    }
 
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
 
       
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";
 
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => 'total',
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
 
        return redirect()->away($session->url);
    }
 
    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }
}