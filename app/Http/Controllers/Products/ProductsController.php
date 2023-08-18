<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Cart\Cart;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
    //show carts
    public function showCart()  {
  $carts=Cart::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view("products.cart",compact("carts"));
    }
    function deleteCart($id){
        $cart=Cart::where('id', $id)->where("user_id",Auth::user()->id)->delete();

        if($cart){
            $class="success";
            $msg= "product deleted  as successfully. ";
        }else{
            $class = "error";
            $msg = "product not  deleted  as successfully. ";
        }
        return redirect()->route("cart.show")->with($class, $msg);

    }
    public function prepareCheckout(Request $request)  {
     $value= $request->price;
     Session::put("price",$value);
     $newprice=Session::get('price');

     if($newprice>0){
  return Redirect::route('cart.checkout');
     }
    }
    public function checkout()  {
         echo "welcome to checkout";

    }

}
