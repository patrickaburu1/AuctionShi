<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   /*get product based on controller*/
    public function productsBasedOnCategory($category_id){
        $products=Product::where('category_id',$category_id)->get();

        /*to be populated in dashboard*/
        $categories=Category::all();

        $category=Category::find($category_id);
        return view('products.filter.byCategory',compact('products','categories','category'));
    }
}
