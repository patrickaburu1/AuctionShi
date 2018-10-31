<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){

        $user_id=Auth::user()->id;

        $categories=Category::all();

        $balance=Transaction::where([['user_id',$user_id],['status',1]])->sum('amount');

        return view('account.top_up',compact('categories','balance'));
    }

    public function topUp(Request $request){
        $user_id=Auth::user()->id;

        $t=new Transaction();
        $t->amount=$request->amount;
        $t->phone=$request->phone;
        $t->user_id=$user_id;
        $t->type="Deposit";
        $t->status=1;
        $t->save();

        return  redirect()->back()->with('success', 'Lipa na M-PESA Online transaction has been initiated on your phone.');

    }

    public function transactions(){
        $user_id=Auth::user()->id;
        /*first get all categories*/
        $categories=Category::all();

        $balance=Transaction::where([['user_id',$user_id],['status',1]])->sum('amount');

        /*get all products*/
        $transactions=Transaction::where([['user_id',$user_id],['status',1]])->get();

        return view('account.transactions',compact('categories','transactions','balance'));
    }

    public function debitCredit($amount, $phone, $debituser ){
        $user_id=Auth::user()->id;

        /*deposit to seller*/
        $t=new Transaction();
        $t->amount=$amount-($amount*0.3);
        $t->phone=$phone;
        $t->user_id=$user_id;
        $t->type="Credit";
        $t->status=1;
        $t->save();


        /*deposit to admin*/
        $t=new Transaction();
        $t->amount=($amount*0.3);
        $t->phone=$phone;
        $t->user_id=1;
        $t->type="Commission";
        $t->status=1;
        $t->save();

        /*deduct from buyer*/
        $t=new Transaction();
        $t->amount="-".$amount;
        $t->phone=$phone;
        $t->user_id=$debituser;
        $t->type="Debit";
        $t->status=1;
        $t->save();

        return $t->phone;
        }
}
