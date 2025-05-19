<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Paymethods;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    //home
    public function home()
    {
        $user = User::where('role','user')->get()->count();

        $product = Product::all()->count();

        $order = order::all()->count();

        $delievered = order::where('status','Delievered')->count();

        return view('admin.layouts.home',compact('user','product','order','delievered'));
    }

    //categoryPage
    public function categoryPage()
    {
        return view('admin.layouts.category');
    }

    //create category
    public function category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',

        ]);

        $category = new Category();

        $category->category_name = $request->category_name;

        $category->save();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Category Added Successfully!');

        return to_route('admin.categoryList');
    }

    //categoryList
    public function categoryList()
    {
        $categories = Category::orderBy('created_at','desc')
                    ->paginate(3);
        return view('admin.layouts.categoryList', compact('categories'));
    }

    //categoryEditPage
    public function categoryEditPage($id)
    {
        $category = Category::find($id);
        return view('admin.layouts.categoryedit', compact('category'));
    }

    //categoryEdit
    public function categoryEdit(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$id,

        ]);

        $category = Category::find($id);

        $category->category_name = $request->category_name;

        $category->update();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Category Updated Successfully!');

        return to_route('admin.categoryList');
    }

    // //categorydelete
    public function categorydelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('Category Deleted Successfully!');

        return back();
    }

    //categorySearch
    public function categorySearch(Request $request)
    {

        // dd($request->all());
        $search = $request->CategorySearch;
        $categories = Category::where('category_name', 'like', '%' . $search . '%')->paginate(4);
        return view('admin.layouts.categoryList', compact('categories'));
    }

    //userlist
    public function userlist(){

        $users = User::orderBy('created_at','desc')->paginate(3);

        return view('admin.layouts.userlist',compact('users'));
    }

    //userDelete
    public function userDelete($id){

        

        $user = User::find($id);

        $userImage = $user->image;
        $userImagePath = public_path('profileImages/'.$userImage);

        if(file_exists($userImagePath)){
            unlink($userImagePath);
        }

        // dd($user->id);

        $user->delete();

        toastr()
        ->closeButton(true)
        ->timeOut(3000) // 3 second
        ->success('User Acconut Deleted Successfully!');

        return back();

    }

    


}
