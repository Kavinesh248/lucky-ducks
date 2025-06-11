<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Demo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if(auth()->guard("admin")->id() == 89){
            return $next($request);
        }else{
            if($request->ajax()){
                return response()->json("You can't access in demo version");
            }else{
                return back()->with("unsuccess","You can't access in demo version");
            }
           
            
        }
    }
}
