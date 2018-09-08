<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /*view to add product*/
    public function index(){

        $categories=Category::all();

        return view('products.upload_product',compact('categories'));
    }

    public function uploadProduct(Request $request){

        $user_id=Auth::user()->id;

        request()->validate([
            'image' => 'required|file|mimes:jpeg,bmp,png|max:2048',
        ]);

        $url=  url('/');

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('productImages'), $imageName);
        $productImage=$url."/productImages/".$imageName;


        $product = new Product();
        $product->name = $request->product_name;
        $product->amount = $request->amount;
        $product->description = $request->product_description;
        $product->category_id = $request->category;
        $product->product_image = $productImage;
        $product->sell_by_date = $request->sellby_date;
        $product->user_id = $user_id;

        try {


            $product->save();

            //return redirect('/')->with('success', 'Success, product now available to buyers');
            return redirect('/')->with('success', 'Success, product now available to buyers');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sorry something went wrong please try again later');
        }
    }


    public function allproducts(){
        $products=Product::where('status',1)->get();

        $categories=Category::all();

        return view('products.allproducts',compact('products','categories'));
    }

    public function placeBid(Request $request, $product_id){
        $user_id=Auth::user()->id;

        $product=Product::where('id',$product_id)->increment('bidders', 1);

        $bid=new Bid();
        $bid->user_id=$user_id;
        $bid->product_id=$product_id;
        $bid->amount=$request->amount;
        $bid->save();

        return redirect()->back()->with('info','Successfully placed bid');
    }
}
