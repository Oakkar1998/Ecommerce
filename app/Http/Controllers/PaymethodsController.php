<?php

namespace App\Http\Controllers;

use App\Models\Paymethods;
use Illuminate\Http\Request;

class PaymethodsController extends Controller
{
    //Payment Page

    public function paymentPage(){

        $paymethods = Paymethods::orderBy('created_at','desc')->get();

        return view('admin.layouts.paymentPage',compact('paymethods'));
    }

    //paymethodCreate

    public function paymethodCreate(Request $request){
        
        // dd($request->all());

        $rules = [
            'account_name'=> 'required',
            'phone_account_number'=> 'required',
            'payment_method'=> 'required',
        ];

        $messages = [
            'account_name.required'=> 'အကောင့်နာမည်ဖြည့်သွင်းရန် လိုအပ်ပါသည်။',
            'phone_account_number.required'=> 'ဖုန်းနံပါတ် (သို့) အကောင့်နံပါတ် ဖြည့်သွင်းရန် လိုအပ်ပါသည်။',
            'payment_method.required'=> 'ငွေပေးချေမှုအမျိုးအစား ဖြည့်သွင်းရန် လိုအပ်ပါသည်။',
        ];

        $request->validate($rules,$messages);

        Paymethods::create([
            'account_name'=> $request->account_name,
            'phone_account_number' =>$request->phone_account_number,
            'payment_method' =>$request->payment_method,
        ]);

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('New Payment Method created Successfully!');

        return back();
    }

    //paymethodDelete
    public function paymethodDelete($id){

        $paymethods = Paymethods::find($id);

        $paymethods->delete();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Payment Method deleted Successfully!');

        return back();

    }

    //paymethodEditPage
    public function paymethodEditPage($id){

        
        $paymethods = Paymethods::find($id);

        return view('admin.layouts.paymethodEditPage',compact('paymethods'));
        
    }

    //paymethodUpdate
    public function paymethodUpdate(Request $request,$id){

       
        $paymethods = Paymethods::find($id);

        $request->validate([
            'account_name'=>'required',
            'phone_account_number'=>'required',
            'payment_method'=> 'required',
        ]);

        $paymethods->account_name = $request->account_name ;

        $paymethods->phone_account_number = $request->phone_account_number ;

        $paymethods->payment_method = $request->payment_method ;

        $paymethods->save();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Payment Method updated Successfully!');

       

        return to_route('pyamentPage');

    }
}
