<?php
namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Http\Resources\ApiSendingErrorException;
use Illuminate\Http\Response;
use App\Http\Resources\ApiErrorNumbers;


class JwtMiddleware
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
		try 
        {
		//    $user = JWTAuth::parseToken()->authenticate();
 		} 
        catch (Exception $e) 
        {
        	// if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
            //     return ApiSendingErrorException::sendingError([
            //         'errNo'=> ApiErrorNumbers::$invalid_token, 
            //         'errMsg'=> __('auth.invalidToken'), 
            //         'statusCode'=>Response::HTTP_UNAUTHORIZED
            //     ]);
            // }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
            //     return ApiSendingErrorException::sendingError([
            //         'errNo'=>ApiErrorNumbers::$expired_token, 
            //         'errMsg'=> __('auth.expiredToken'), 
            //         'statusCode'=>Response::HTTP_UNAUTHORIZED
            //     ]);
            // }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException){
            //     return ApiSendingErrorException::sendingError([
            //         'errNo'=>ApiErrorNumbers::$blacklisted_token, 
            //         'errMsg'=> __('auth.blacklistedToken'), 
            //         'statusCode'=>Response::HTTP_UNAUTHORIZED
            //     ]);
            // }else{
            //     return ApiSendingErrorException::sendingError([
            //         'errNo'=>ApiErrorNumbers::$token_not_found,
            //         'errMsg'=> __('auth.tokenNotFound'), 
            //         'statusCode'=>Response::HTTP_UNAUTHORIZED
            //     ]);
            // }
		}
        
        return $next($request);
	}
}