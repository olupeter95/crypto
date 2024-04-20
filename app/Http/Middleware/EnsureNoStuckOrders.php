<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\OpenOrder;
use Illuminate\Support\Facades\Auth;

class EnsureNoStuckOrders
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
        $incomplete_orders      = (new OpenOrder())->checkForIncompleteOrders($request->route()->getName());
        if (count($incomplete_orders) > 0) {
            # code...
            (new OpenOrder())->checkIfOrderIsStuck($incomplete_orders);
        }
        
        return $next($request);
    }
}
