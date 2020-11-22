<?php

namespace App\Http\Middleware;

use Closure;

class IsAsistant
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
        if(auth()->user()->asistant == 1 || auth()->user()->profesor == 1 || auth()->user()->admin == 1){
            return $next($request);
        }
        auth()->logout();
        return redirect('index')->with('error',"Nejste Asistent.");
    }
}
