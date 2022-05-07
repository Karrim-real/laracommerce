<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddressController extends Controller
{

    public function index()
    {
        # code...
        $addressme = Address::where('user_id', Auth::user()->id);
        return view('frontend.checkout', compact('address'));
    }
}
