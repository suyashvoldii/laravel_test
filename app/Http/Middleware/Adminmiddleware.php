<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Adminmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          /*return $next($request);*/
        
              if(Auth::User()){
                return $next($request);
              }
            
        


    }
}
// if(Auth::check()){
//               if(Auth::User()->role == '1'){
//                 return $next($request);
//               }
//               else
//               {
//                   return redirect('/home')->with('status','Access denied');
//               }
//           }
//           else{
//               return redirect()->back()->with('status','login first');
//           }