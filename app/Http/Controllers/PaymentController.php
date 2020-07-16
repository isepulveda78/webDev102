<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function payment()
    {
        $availablePlans =[
           'price_1H5cheB1EnMR0CjZypRf5guu' => "One Day Trial",
           'Monthly' => "Monthly",
           'price_1H5bO5B1EnMR0CjZ3T5A6Inm' => "Yearly"
        ];
        $data = [
            'intent' => auth()->user()->createSetupIntent(),
            'plans'=> $availablePlans
        ];
        return view('payment')->with($data);
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->payment_method;

        $planId = $request->plan;
        $user->newSubscription('main', $planId)->create($paymentMethod);

        return response([
            'success_url'=> redirect()->intended('/')->getTargetUrl(),
            'message'=>'success'
        ]);

    }
    public function cancel()
    {
        $user = auth()->user();
        $user->subscription('main')->cancel();
        return view('home');
    }
}
