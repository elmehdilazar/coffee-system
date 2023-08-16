<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function singleProduct($id)  {

        $product=Product::find($id);

       $relatedProduct=Product::where("cat_id",$product->cat_id)->where('id','!=',$id)->take(4)->get();
        return view("products.productsingle",compact("product", "relatedProduct"));

    }
}
