<?php

namespace proyecto_2015\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class Gestion
{   protected $auth;


    public function __construct(Guard $auth){
        $this->auth = $auth;  
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next)
    {   
         
       if ( $this->auth->user()->consulta() ){
           return abort(401); 
        
       }       
       else {
         return  $next($request);
        }
        
    }
}
