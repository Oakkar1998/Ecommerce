<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Paymethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //Cart
    public function cart($id)
    {



        // dd($Product_id);

        $user_id = Auth::user()->id;
        $count = Cart::where('user_id',$user_id)->count();

        $cart = new Cart();

        $cart->user_id = $user_id;
        $cart->product_id = $id;
        $cart->save();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Product added to cart Successfully!');

        return back();
    }

    //Cart List
    public function cartPage()
    {


        $user_id = Auth::user()->id;
        $Carts = Cart::where('user_id',$user_id)->get();

        $count = Cart::where('user_id',$user_id)->count();

        $invoice_number = rand(1000,99999);

        $paymethods = Paymethods::all();

        return view('customer.cart',compact('Carts','count','invoice_number','paymethods'));
    }

    //Cart Delete
    public function cartDelete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Product removed from cart Successfully!');

        return back();
    }
}
