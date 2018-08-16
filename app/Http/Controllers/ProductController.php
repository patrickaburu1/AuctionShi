<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        return redirect('home');
    }
    public function uploadProduct(Request $request){

        request()->validate([
            'image' => 'required|file|mimes:jpeg,bmp,png|max:2048',
        ]);

        $url=  url('/');

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $receipt=$url."/public/images/".$imageName;


        $product = new Product();
        $product->name = $request->product_name;
        $product->amount = $request->amount;
        $product->description = $request->product_description;
        $product->category_id = $request->category;
        $product->sell_by_date = $request->sellby_date;
        $product->user_id = 1;

        try {


            $product->save();

            return redirect('/')->with('success', 'Success, product now available to buyers');

        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sorry something went wrong please try again later');
        }
    }
}
