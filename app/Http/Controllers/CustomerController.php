<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
   //dashboard
   public function dashboard()
   {
        $Products = Product::all();
        $user_id = Auth::user()->id;
        $count = Cart::where('user_id',$user_id)->count();

        

       return view('customer.dashboard',compact('Products','count'));
   }

   //Product Search
    public function productSearch(Request $request)
    {
        $search = $request->search;
        $Products = Product::where('Product_name','like','%'.$search.'%')->get();
        $user_id = Auth::user()->id;
        $count = Cart::where('user_id',$user_id)->count();
        return view('customer.dashboard',compact('Products','count'));
    }
    //Product Details
    public function productDetails($id)
    {
        $Product = Product::where('id',$id)->first();
        $Category = Category::where('id',$Product->category_id)->first();
        $user_id = Auth::user()->id;
        $count = Cart::where('user_id',$user_id)->count();
        return view('customer.productDetails',compact('Product','count'));
    }

    //myorders
    public function myorders(){

        $user_id = Auth::user()->id;

        $count = Cart::where('user_id',$user_id)->count();

        $order = order::where('user_id',$user_id)->get();

        return view('customer.myorders',compact('count','order'));
    }

    //profile
    public function profile($id){
        

        $user = User::find($id);

        $count = Cart::where('user_id',$id)->count();

        return view('customer.profile',compact('count','user'));
    }

    //profileEditPage
    public function profileEditPage($id){

       
        $user = User::find($id);
        

        $count = Cart::where('user_id',$id)->count();

        return view('customer.editProfile',compact('count','user'));
    }

    //profileEdit

    public function profileEdit(Request $request,$id){

        

        $user = User::find($id);

        $count = Cart::where('user_id',$id)->count();

        // dd($user->image);

        $user->name = $request->name;

        $user->phone = $request->phone;
    
        $user->email = $request->email;
    
        $user->address = $request->address;
    
        $image = $request->file('image');

        $oldImage = $user->image;

        if($image){
            
            //create new image
            $imageName = time().$image->getClientOriginalName();

            $imagePath = public_path('profileImages');

            $image->move($imagePath,$imageName);

            
            // // delete old image
            if($user->image){
                
                $oldImagePath = public_path('profileImages/'.$user->image);

                if(file_exists($oldImagePath)){

                    unlink($oldImagePath);
                }
            }

            $user->image = $imageName;

            $user->save();
        }else{
            $user->image = $oldImage;
            $user->save();
        }

        

        return view('customer.profile',compact('user','count'));
    }

    


}
