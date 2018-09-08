<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
