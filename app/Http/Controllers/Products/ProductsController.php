<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Cart\Cart;
use App\Models\Categories\Category;
use App\Models\Order\Detail_order;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function singleProduct($id)
    {

        $product = Product::find($id);

        $relatedProduct = Product::where("cat_id", $product->cat_id)->where('id', '!=', $id)->take(4)->get();
        return view("products.productsingle", compact("product", "relatedProduct"));
    }
    //addcart
    public function addCart(Request $request, $id)
    {
        $addcart = Cart::create([
            'prod_id' => $id,
            'user_id' => Auth::user()->id,
            'qte' => $request->qte
        ]);

        return redirect()->route('product.single', $id)->with("success", "product added to cart as successfully. ");
    }
    //show carts
    public function showCart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view("products.cart", compact("carts"));
    }
    function deleteCart($id)
    {
        $cart = Cart::where('id', $id)->where("user_id", Auth::user()->id)->delete();

        if ($cart) {
            $class = "success";
            $msg = "product deleted  as successfully. ";
        } else {
            $class = "error";
            $msg = "product not  deleted  as successfully. ";
        }
        return redirect()->route("cart.show")->with($class, $msg);
    }
    public function prepareCheckout(Request $request)
    {
        $value = $request->price;
        Session::put("total", $value);
        $newprice = Session::get('total');

        if ($newprice > 0) {
            return Redirect::route('cart.checkout');
        }
    }
    public function checkout()
    {

        return view("products.checkout");
    }
    public  function storeOrder(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();

        $data = array_merge($request->all(), ["user_id" => Auth::user()->id]);
        $Order = Order::create($data);

        foreach ($cart as $key => $value) {
            Detail_order::create(
                [
                    'order_id' => $Order->id,
                    'prod_id' => $value->prod_id,
                    'qte' => $value->qte,

                ]
            );
        }

        return Redirect::route("checkout.paiment");
    }
    public function paypal_check()
    {
        return view("products.pay");
    }
    function success_paiment()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->delete();
        if ($cart) {
            Session::forget("total");
        }
        return view("products.success");
    }
    function menu()  {
        $categories=Category::All();


  return view("products.menu",compact("categories"));
    }
}
