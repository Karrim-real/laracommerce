<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class FrontedController extends Controller
{
    public function index()
    {
        // dd(User::all());
        $catid = Category::latest()->take(3)->get();
        $products = Product::latest()->take(4)->get();
        return view('frontend.index', compact('products','catid'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function userAccount()
    {
        return view('frontend.accountPage');
    }

    public function prodCategory($catID)
    {
        $catId = Category::find($catID);
        $products = Product::where('cat_id', $catID)->get();
        // dd($products);
        return view('frontend.shop', compact('products'));
    }

    public function shop()
    {
        $products = Product::where('status', '0')->take(10)->get();

        return view('frontend.shop', compact('products'));
    }
    public function singleProduct($id)
    {
        $single_Prod = Product::find($id);
        $products = Product::latest()->take(6)->get();
        return view('frontend.single-product', compact('single_Prod', 'products'));
    }

    public function cart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('frontend.cart', compact('carts'));
    }
    public function minicart()
    {
            $minCarts = Cart::where('user_id', Auth::user()->id)->get();
            return view('layouts.frontend.minicart', compact('minCarts'));
    }
    public function addToCart(Request $request)
    {
        $prodID = $request->input('prod_id');
        $prodQty = $request->input('prod_qty');
        if(Auth::check()){
            $prod_id = Product::where('id', $prodID)->first();
            if (Cart::where('prod_id', $prodID)->where('user_id', Auth::user()->id)->first()) {
               return response()->json(['error' =>  $prod_id->name.' Already Added to Cart']);
            }else{
                $prod_id = Product::where('id', $prodID)->first();
                // dd(Auth::user()->id);
                Cart::create([
                    'user_id' =>Auth::user()->id,
                    'prod_id' => $prodID,
                    'prod_qty' => $prodQty
                ]);
                return response()->json(['success' => $prod_id->name.' Product Added to Cart']);
            }
        }else{
            return response()->json(['loginerror' => 'Login to Contiue']);
        }

        // $prod_id = Product::where('id', $prodID)->first();
        // $cart_id = Cart::where('id', $prod_id)->first();
        // $user_Id = Auth::user()->id;
        // dd($user_Id);
        // dd($prod_id->id);

    }
    public function updateCart(Request $request, $prodID)
    {
        $product = Cart::find($prodID);
        dd($product);
    }
    public function removeCartProd(Request $request, $prodID)
    {
        // dd($prodID);
        $user_Id = Auth::user()->id;
        $cart = Cart::where('prod_id', $prodID)->where('user_id', $user_Id);
        if($cart){
            $cart->delete();
            return redirect()->route('cart')->with('status', 'Product Removed, Please Add more Product in to your cart');
        }else{
            return redirect('frontend.cart')->with('status', 'An error occur');
        }

    }

    public function testPay()
    {
        return view('frontend.testpayment');
    }
}
