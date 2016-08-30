<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Routing\Middleware;

class Admin
{
    protected $auth;
    protected $response;

    public function __construct(Guard $auth, ResponseFactory $response)
    {
        $this->auth = $auth;
        $this->response = $response;
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
//        if ($this->auth->check())
//        {
//            $admin = 0;
//            if($this->auth->user()->admin==1)
//            {
//                $admin=1;
//            }
//            if($admin==0){
//                return $this->response->redirectTo('/');
//            }
//            return $next($request);
//        }
//        return $this->response->redirectTo('/');
        return $next($request);
    }
}
