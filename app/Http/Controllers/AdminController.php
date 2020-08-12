<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function products(){
        /*first get all categories*/
        $categories=Category::all();

        /*get all products*/
        $products=Product::where('status',1)->get();

        return view('admin.products',compact('categories','products'));
    }

    public function suspendProduct($productId){

        $close = Product::find($productId);
        $close->status = 3;/*change product status to suspended*/
        $close->save();

        return  redirect()->back()->with('info', 'Product suspended');
    }

    public function category(){
        $categories=Category::all();
        return view('admin.addcategory', compact('categories'));
    }

    public function addCategory(Request $request){

        $category=new Category();
        $category->name=$request->category;
        $category->description=$request->description;
        $category->save();

        return  redirect()->back()->with('info', 'Category added');
    }
}
