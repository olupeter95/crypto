<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\OpenOrder;
use Illuminate\Support\Facades\Auth;

class MoveCompletedOrdersToTradeHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $complete_orders        = (new OpenOrder())->checkForCompleteOrders($request->route()->getName());
        if (count($complete_orders) > 0) {
            # code...
            (new OpenOrder())->moveToTradeHistory($complete_orders);
        }

        return $next($request);
    }
}
