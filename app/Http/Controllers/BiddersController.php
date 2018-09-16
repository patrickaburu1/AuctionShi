<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiddersController extends Controller
{
    /*give biders info on particular product*/
  public function bidders($product_id){
      $categories=Category::all();

      $product=Product::where('id',$product_id)->first();

      $bidders=Bid::where('product_id',$product_id)->orderBy('amount','DESC')->get();

      return view('products.bidders',compact('bidders','categories','product'));
  }

  public function wonBids(){

      $user_id=Auth::user()->id;

      /*first get all categories*/
      $categories=Category::all();

      $wonbids=Bid::where([['user_id',$user_id],['status',1]])->get();

      return view('products.wonbids',compact('wonbids','categories'));
  }

    public function placedBids(){

        $user_id=Auth::user()->id;

        /*first get all categories*/
        $categories=Category::all();

        $placedbids=Bid::where([['user_id',$user_id],['status',0]])->get();

        return view('products.placedbids',compact('placedbids','categories'));
    }

    /*withdraw bid*/
    public function withdrawBid($bid_id){

            $give_bidder = Bid::find($bid_id);
            $give_bidder->status = 2;
            $give_bidder->save();

        return  redirect('/placed-bids')->with('info', 'Successfully withdrawn bid');
        }
}
