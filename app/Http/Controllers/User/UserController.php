<?php

namespace App\Http\Controllers\User;

use App\Models\Order\Order;
use Illuminate\Http\Request;
use App\Models\Order\Booking;

use App\Models\Order\Reviews;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Booking as RequestsBooking;

class UserController extends Controller
{
    function booking(RequestsBooking $request)
    {

        $data = array_merge($request->all(), ["user_id" => Auth::user()->id]);
        $data["date"] = date("Y-m-d", strtotime($data["date"]));

        if ($data["date"] > date("Y-m-d")) {
            if (Booking::create($data)) {

                return Redirect::route('home')->with("success", "you booked a table as successfully ");
            } else {
                return Redirect::route('home')->with("error", "booking faild");
            }
        } else {
            return Redirect::route('home')->with("warning", "enter a future days");
        }
    }
    public function displaysOrders()
    {

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(4);
        return view("user.order", compact("orders"));
    }
    public function displaysBooking()
    {

        $booking = Booking::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(4);
        return view("user.booking", compact("booking"));
    }

    function AddReview($id, $type)
    {
        return view("user.review", ["id" => $id, "type" => $type]);
    }
    function proccessingreview(Request $request, $id, $type)
    {
        $review = new Reviews();
        $review->user_id = Auth::user()->id;
        $review->name = $request->name;
        $review->message = $request->message;
        if ($type == "order") {
            $order=Order::find($id);
            $order->reviews()->save($review);
            return  redirect()->back()->with("success", "reviews sended");
        } else if ($type == "booking") {
            $booking = Booking::find($id);
            $booking->reviews()->save($review);
            return  redirect()->back()->with("success", "reviews sended");
        } else {
            return  redirect()->back()->with("error", "reviews not  sended");
        }
    }
}
