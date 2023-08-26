<?php

namespace App\Http\Controllers;

use App\Models\Order\Reviews;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {  $products=Product::select()->orderBy('id', 'DESC')->take("4")->get();
        $reviews=Reviews::select()->orderBy('id', 'DESC')->take("6")->get();
        return view('home',compact("products","reviews"));
    }
    function about()  {
        $products = Product::select()->orderBy('id', 'DESC')->take("4")->get();
        $reviews = Reviews::select()->orderBy('id', 'DESC')->take("6")->get();
  return view("pages.about", compact("products", "reviews"));
    }
    function services()  {
        return view("pages.services");
    }
    function contact()  {
        return view("pages.contact");
    }
}
