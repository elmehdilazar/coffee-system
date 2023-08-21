<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
  function booking(Request $request)  {

    $data=array_merge($request->all(),["user_id"=>Auth::user()->id]);
    $data["date"] = date("Y-m-d",strtotime($data["date"]));

if($data["date"]>date("Y-m-d")){
  if( Booking::create($data)){

      return Redirect::route('home')->with("success", "you booked a table as successfully ");
  }else{
                return Redirect::route('home')->with("error", "booking faild");
  }
}else{
            return Redirect::route('home')->with("warning", "enter a future days");
}
  }
}
