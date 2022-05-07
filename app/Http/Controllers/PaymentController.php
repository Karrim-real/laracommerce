<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Exists;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();

        if($paymentDetails['data']['status'] == 'success'){
            $status = $paymentDetails['data']['status'];
            // dd($status);
            $payment_ref = $paymentDetails['data']['reference'];
            $allInput = session('userInfo');
            $checkAddress = Address::where('user_id', Auth::user()->id)->first();
            if($checkAddress){
                $checkAddress->update($allInput);
                $address_id = Address::where('user_id', Auth::user()->id)->first();
                $carts = Cart::where('user_id', Auth::user()->id)->get();
                foreach ($carts as $prods) {
                    Order::create([
                        'address_id' => $address_id->id,
                        'user_id' => Auth::user()->id,
                        'prod_id' => $prods->prod_id,
                        'prod_qty' => $prods->prod_qty,
                        'message' => $request->message,
                        'tracking_id' => 'limba'.time(),
                        'payment_ref' => time().$payment_ref,
                        'total_price' => $prods->products->selling_price,
                        'status' => $status,
                    ]);
                    // dd($prods->user_id);
                }
                    Cart::destroy($carts);

                    return redirect('thank-you');

            }else{
                Address::create($allInput);
                $address_id = Address::where('user_id', Auth::user()->id)->first();
                $carts = Cart::where('user_id', Auth::user()->id)->get();
                foreach ($carts as $prods) {
                    Order::create([
                        'address_id' => $address_id->id,
                        'user_id' => Auth::user()->id,
                        'prod_id' => $prods->prod_id,
                        'prod_qty' => $prods->prod_qty,
                        'message' => $request->message,
                        'tracking_id' => 'limba'.time(),
                        'payment_ref' => time().$payment_ref,
                        'total_price' => $prods->products->selling_price,
                        'status' => $status,
                    ]);
                    // dd($prods->user_id);
                }
                Cart::destroy($carts);

                return redirect('thank-you');

            }

        }else{
            return back()->with(['status' => 'Error in Processing Payment, Please try again later']);
        }
        // dd($paymentDetails);
        // return response()->json(['status' => $paymentDetails]);

        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
