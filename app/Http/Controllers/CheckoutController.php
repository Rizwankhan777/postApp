<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $cartItems= CartModel::where('user_id',Auth::id())->get();
        return view('checkout',compact('cartItems'));
    }
}
