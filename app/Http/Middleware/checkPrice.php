<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->url('cart/checkout') or $request->url('cart/paiment')  or
            $request->url('cart/checkout') or
            $request->url('cart/success_paiment')


        ) {


                if (Session::get('total') === 0) {

                    return abort(403);
                }

        }
        return $next($request);
    }
}
