<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{
    //createOrder
    public function createOrder(Request $request)
    {
        
        
        $user_id = Auth::user()->id;

        $carts = Cart::where('user_id',$user_id)->get();

        

       foreach($carts as $item){

        $order = new order;

        $order->name = Auth::user()->name;

        $order->phone_number = Auth::user()->phone;

        $order->address = Auth::user()->address;

        $order->user_id = $user_id;

        $order->product_id = $item->product_id;

        $order->invoice_number = $request->invoice_number;

        $order->save();


    }

    $cart_remove = Cart::where('user_id',$user_id)->get();

    foreach($cart_remove as $item){

        $data = Cart::find($item->id);

        $data->delete();
    }

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('order Successfully!');

        return back();




    }

    //order
    public function order(){
        $data = Order::all();
        return view('admin.layouts.order',compact('data'));
    }

    //onTheWay
    public function onTheWay($id){

        $data = order::find($id);

        $data->status = 'On The Way';

        $data->save();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Status Changed Successfully!');

        return back();




    }

    //
    public function Delievered($id){

        $data = order::find($id);

        $data->status = 'Delievered';

        $data->save();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Status Changed Successfully!');

        return back();




    }

    //print
    public function print($id){

        $data = order::find($id);
        

        $pdf = Pdf::loadView('admin.layouts.print', compact('data'));
        return $pdf->download('print.pdf');
    }



}
