<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Cart\Cart;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function singleProduct($id)  {

        $product=Product::find($id);

       $relatedProduct=Product::where("cat_id",$product->cat_id)->where('id','!=',$id)->take(4)->get();
        return view("products.productsingle",compact("product", "relatedProduct"));

    }
    //addcart
    public function addCart(Request $request,$id)   {
    $addcart=Cart::create([
        'prod_id' => $id,
        'user_id'=> Auth::user()->id,
        'qte'=>$request->qte
    ]);
    
   return redirect()->route('product.single',$id)->with("success", "product added to cart as successfully. ");
    }

}
