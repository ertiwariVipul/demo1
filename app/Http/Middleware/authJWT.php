<?php
namespace App\Http\Middleware;
use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use config;

class authJWT
{
    public function handle($request, Closure $next)
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return customError(config('messages.token.invalid'));
            }
        }
        catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return customError(config('messages.token.invalid'));
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return customError(config('messages.token.expired'));
            }else{
                return customError(config('messages.token.required'));
            }
        }
        return $next($request);
    }

}

