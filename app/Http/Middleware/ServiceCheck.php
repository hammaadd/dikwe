<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$service)
    {
        foreach(Session::get('services') as $serv)
        {
            if($serv->module==$service && $serv->status=="A")
            {
                return $next($request);
            }
            
        }
        return redirect()->route('admin.dashboard');
        
    }
}
