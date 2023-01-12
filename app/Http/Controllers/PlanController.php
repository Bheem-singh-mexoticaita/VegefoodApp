<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Stripe;

class PlanController extends Controller
{
   public function index(){
      $plans =    Plan::get();
      return view('frontend.index', compact('plans'));

   }
   public function show(Plan $plan, Request $request)
   {
       return view("frontend.subscription", compact("plan"));
   }

   public function subscription(Request $request){
      try {
         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));   
         header('Content-Type: application/json');
         // http://127.0.0.1:8000/
         $domain_url = 'http://127.0.0.1:8000/';
         $bhjhjjh = [
            'payment_method_types' => ['card'],
            'line_items' => [[
              'price_data' => [
                'currency' => 'inr',
                'unit_amount' => $request->ProductCost * 100 ,
                'product_data' => [
                  'name' => $request->ProductName,
                ],
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000' . '/PaymentSucuss'.'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' =>route('Paymenterror'),
            ];
$checkout_session = \Stripe\Checkout\Session::create( $bhjhjjh);

return redirect($checkout_session->url);

      }catch(Exception $e){
         // return back()->with('success',$e->getMessage());
      }
   }

   public function PaymentSucuss(Request $request){

      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));  
      $ftech_records = \Stripe\Checkout\Session::retrieve(
         $request->session_id,
         []
       );
      return $ftech_records;
   }
   
}

