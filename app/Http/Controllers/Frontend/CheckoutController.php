<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Paystack;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $cart_items = Cart::where('user_id', Auth::user()->id)->get();
        $address = Address::where('user_id', Auth::user()->id)->first()->get();
        return view('frontend.checkout', compact('cart_items', 'address'));
    }

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

    public function store(Request $request)
    {
        $input = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'street' => 'required',
            'state' => 'required',
            'local' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $allInput = $request->all();
        session(['userInfo' => $allInput]);

        // $paymentDetails = Paystack::getPaymentData();
        // dd($paymentDetails);
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }

    }

    public function show()
    {
        return view('frontend.thank-you');
    }
}
