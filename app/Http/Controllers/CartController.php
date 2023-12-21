<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        //   dd($request->all());
        if (Auth::check()) {

            // $prod_check = ProductModel::where('id',$product_id)->first();
            $alreadyCart = CartModel::where('product_id', $product_id)->where('user_id', Auth::id())->first();
            // dd($alreadyCart);
            if ($alreadyCart) {
                $alreadyCart->product_Qty = $alreadyCart->product_Qty + $product_qty;
                $alreadyCart->update();
                return response()->json(['status' => true, 'message' => 'Cart Updated']);
            } else {
                $cartItem = new CartModel();
                $cartItem->product_id = $product_id;
                $cartItem->product_Qty = $product_qty;
                $cartItem->user_id = Auth::id();
                $cartItem->save();
                return response()->json(['status' => true, 'message' => 'Product Added in Cart']);
            }
        } else {
            return response()->json(['status' => true, 'message' => 'Login To Continue']);
        }
    }

    public function cartView()
    {
        $cartItems = CartModel::with('cartProducts')->where('user_id', Auth::id())->get();
        return view('cart', compact('cartItems'));
    }

    public function deleteCartItem(Request $request)
    {
        $product_id = $request->product_id;
        // dd($request->all());

        if (Auth::check()) {
            $cartItem = CartModel::where('id', $product_id)->first();
            // dd($cartItem);
            if ($cartItem) {
                // $cartItem =  CartModel::where('id',$product_id)->first();
                // dd($cartItem);
                $cartItem->delete();
                return response()->json(['status' => true, 'message' => 'Product Deleted Successfully']);
            }
        } else {
            return response()->json(['status' => true, 'message' => 'Login To Continue']);
        }
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;
        // dd($product_id,$product_qty);
        foreach ($product_id as $p_key => $p_item) {
            foreach ($product_qty as $qty_key => $qty_item) {
                if ($p_key == $qty_key) {
                    CartModel::where('product_id', $p_item)->update(['product_Qty' => $qty_item]);
                }
            }
        }
        return redirect()->back()->with('success', 'Your Cart is Updated');
        // return redirect()->back();
    }
}
