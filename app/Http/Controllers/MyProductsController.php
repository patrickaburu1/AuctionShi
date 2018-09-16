<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Category;
use App\Product;
use App\User;
use DemeterChain\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyProductsController extends Controller
{


    public function myProducts(){
        $user_id=Auth::user()->id;

        /*first get all categories*/
        $categories=Category::all();

        /*get all products*/
        $products=Product::where('user_id',$user_id)->get();

        return view('products.myproducts',compact('categories','products'));
    }

    public function runningProducts(){

        $user_id=Auth::user()->id;
        /*first get all categories*/
        $categories=Category::all();

        /*get all products*/
        $products=Product::where([['user_id',$user_id],['status',1]])->get();

        return view('products.runningproducts',compact('categories','products'));
    }

    public function soldProducts(){

        $user_id=Auth::user()->id;
        /*first get all categories*/
        $categories=Category::all();

        /*get all products*/
        $products=Product::where([['user_id',$user_id],['status',2]])->get();

        return view('products.soldproducts',compact('categories','products'));
    }

    public function suspendedProducts(){

        $user_id=Auth::user()->id;
        /*first get all categories*/
        $categories=Category::all();

        /*get all products*/
        $products=Product::where([['user_id',$user_id],['status',3]])->get();

        return view('products.suspendedproducts',compact('categories','products'));
    }

    /*close bid*/
    public function closeBid($product_id, $bid_id){

        try {

            $give_bidder=Bid::find($bid_id);
            $give_bidder->status=1;
            $give_bidder->save();

            $close = Product::find($product_id);
            $close->status = 2;/*change product status to closed*/
            $close->save();


            DB::table('bids')->where('product_id',$product_id)->update(array('product_status'=>2));
/*
            $close_bids=Bid::where('product_id',$product_id);
            $close_bids->product_status=1;
            $close_bids->save();*/

            return  redirect('/running-products')->with('info', 'Successfully given out bid');
        }
        catch (\Exception $e){
            return redirect()->back()->with('error', 'Sorry something went wrong please try again later');
        }

    }
}
