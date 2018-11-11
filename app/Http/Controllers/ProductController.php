<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Category;
use App\Product;
use Carbon\Carbon;
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
            'image' => 'required|file|mimes:jpeg,bmp,png|max:8048',
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
        $now=Carbon::now();
        $date=$now->toDateString();

        $products=Product::where([['status',1],['sell_by_date','>',$date]])->orderby('id','DESC')->get();

        $categories=Category::all();

        return view('products.allproducts',compact('products','categories'));
    }

    public function placeBid(Request $request, $product_id){
        $user=Auth::user();
        $product=Product::where('id',$product_id)->first();

        if ($user->id==$product->user_id){
            return redirect()->back()->with('error', 'Sorry cant place bid on own product');
        }
        $buyingPrice=$request->amount;
        $sellingPrice=$product->amount;

        if($buyingPrice> $sellingPrice*1.2){
            return redirect()->back()->with('error', 'Sorry, the amount placed is too high for the product. Amount cannot exceed '.$sellingPrice*1.2);
        }

        if($buyingPrice < $sellingPrice*0.8){
            return redirect()->back()->with('error', 'Sorry, the amount placed is too low for the bid. Amount cannot be below '.$sellingPrice*0.8);
        }

        try {

            Product::where('id', $product_id)->increment('bidders', 1);

            $bid = new Bid();
            $bid->user_id = $user->id;
            $bid->product_id = $product_id;
            $bid->product_name = $product->name;
            $bid->user_name = $user->name;
            $bid->seller_price = $product->amount;
            $bid->amount = $request->amount;
            $bid->save();

            return redirect()->back()->with('info', 'Successfully placed bid');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sorry something went wrong please try again later');
        }
    }


}
