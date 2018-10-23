<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){

        $categories=Category::all();

        return view('account.top_up',compact('categories'));
    }

    public function topUp(Request $request){
        $user_id=Auth::user()->id;

        $t=new Transaction();
        $t->amount=$request->amount;
        $t->phone=$request->phone;
        $t->user_id=$user_id;
        $t->type="Deposit";
        $t->status=0;
        $t->save();

        return  redirect()->back()->with('success', 'Lipa na M-PESA Online transaction has been initiated on your phone.');

    }

    public function transactions(){
        $user_id=Auth::user()->id;
        /*first get all categories*/
        $categories=Category::all();

        /*get all products*/
        $transactions=Transaction::where([['user_id',$user_id]])->get();

        return view('account.transactions',compact('categories','transactions'));
    }
}
