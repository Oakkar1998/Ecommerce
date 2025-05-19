<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    //productPage
    public function productPage()
    {
        $Category = Category::all();
        return view('admin.layouts.product',compact('Category'));
    }

    //productCreate
    public function productCreate(Request $request)
    {
        $rules = [
            'Product_name' => 'required|unique:products,Product_name',
            'Price' => 'required|numeric|min:1',
            'Product_Quantity' => 'required|numeric|min:1|max:1000',
            'Product_Description' => 'required',
            'Product_Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'category_name' => 'required',
        ];

        $messages = [
            'Product_name.required' => 'ထုတ်ကုန်အမည်လိုအပ်ပါသည်',
            'Price.min' => 'ထုတ်ကုန်စျေးနှုန်းသည် အနည်းဆုံး ၁-ဖြစ်ရန် လိုအပ်ပါသည်',
            'Price.max' => 'ထုတ်ကုန်စျေးနှုန်းသည် အများဆုံး ၁၀၀၀-ဖြစ်ရန် လိုအပ်ပါသည်',
            'Price.required' => 'ထုတ်ကုန်စျေးနှုန်းလိုအပ်ပါသည်',
            'Product_Quantity.required' => 'ထုတ်ကုန်အရေအတွက်လိုအပ်ပါသည်',
            'Product_Description.required' => 'ထုတ်ကုန်ဖော်ပြချက်လိုအပ်ပါသည်',
            'image.required' => 'Product Image is required',
            'image.image' => 'Product Image must be an image',
            'image.mimes' => 'Product Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Product Image must be a file of type: jpeg, png, jpg, gif, svg and size less than 2MB.',
            'category_name.required' => 'Category is required',
        ];
       $request->validate($rules,$messages);

        // dd($request->all());

        $product = new Product();

        $product->Product_name = $request->Product_name;
        $product->Price = $request->Price;
        $product->Product_Quantity = $request->Product_Quantity;
        $product->Product_Description = $request->Product_Description;
        $product->Product_Image = $request->Product_Image;
        $product->Category_name = $request->category_name;

        if ($request->hasFile('Product_Image')) {
            $image = $request->file('Product_Image');
            $imageName = time() . 'oakkar' . $image->GetClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }
        $product->Product_Image = $imageName;

        $product->save();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Product Updated Successfully!');// Alert::success('Create New Product', 'Successfully Created New Product');


        return to_route('admin.productList');
    }

    //productList
    public function productList()
    {
        $products = Product::orderBy('created_at', 'desc')
                    ->paginate(3);
        return view('admin.layouts.productList', compact('products'));
    }

    //productDelete
    public function productDelete($id)
    {
        $product = Product::find($id);
        $image_path = public_path('images/') . $product->Product_Image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Product Deleted Successfully!');// Alert::success('Delete Product', 'Successfully Deleted Product');

        return back();
    }

    //productEditPage
    public function productEditPage($id)
    {
        // dd($request->all());
        $product = Product::find($id);
        return view('admin.layouts.productEdit', compact('product'));
    }

    //productEdit
    public function productEdit(Request $request, $id)
    {
        

        // dd($product->Product_Image);

        $rules = [
            'Product_name' => 'required|unique:products,Product_name,'.$id,
            'Price' => 'required|numeric|min:1',
            'Product_Quantity' => 'required|numeric|min:1|max:1000',
            'Product_Description' => 'required',
            'New_Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', //2mb
            

        ];

        $messages = [
            'Product_name.required' => 'ထုတ်ကုန်အမည်လိုအပ်ပါသည်',
            'Product_name.unique' => 'နာမည်တူ၍ မရပါ',
            'Price.min' => 'ထုတ်ကုန်စျေးနှုန်းသည် အနည်းဆုံး ၁-ဖြစ်ရန် လိုအပ်ပါသည်',
            'Price.max' => 'ထုတ်ကုန်စျေးနှုန်းသည် အများဆုံး ၁၀၀၀-ဖြစ်ရန် လိုအပ်ပါသည်',
            'Price.required' => 'ထုတ်ကုန်စျေးနှုန်းလိုအပ်ပါသည်',
            'Product_Quantity.required' => 'ထုတ်ကုန်အရေအတွက် လိုအပ်ပါသည်',
        ];

       

        $request->validate($rules,$messages);


        $product = Product::find($id);

        $product->Product_name = $request->Product_name;

        $product->Price = $request->Price;

        $product->Product_Quantity = $request->Product_Quantity;

        $product->Product_Description = $request->Product_Description;

        $newImage = $request->file('New_Image');

        if( $newImage ) {

            //new image upload
            $imageName = time().'oakkar'.$newImage->getClientOriginalName();

            $imagePath = public_path('images/');

            $newImage->move($imagePath,$imageName);

            //delete old image
            $oldImagePath = public_path('images/'.$product->Product_Image);

            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }

            $product->Product_Image = $imageName;

            $product->save();
        }else{
            $product->Product_Image = $product->Product_Image;
            $product->save();
        }



        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Product Updated Successfully!');// Alert::success('Update Product', 'Successfully Updated Product');

        return to_route('admin.productList');
    }

    //ProductSearch
    public function productSearch(Request $request)
    {

        // dd($request->all());
        $search = $request->search;
        $products = Product::where('Product_name', 'like', '%' . $search . '%')->paginate(3);
        return view('admin.layouts.productList', compact('products'));
    }
}
