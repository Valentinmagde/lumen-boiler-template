<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request Request.
     * @param  \Closure  $next Next.
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            FacadesJWTAuth::parseToken()->authenticate();

            return $next($request);
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return errorResponse(
                    Response::HTTP_UNAUTHORIZED,
                    ERROR_CODE['INVALID_TOKEN'],
                    t('auth.invalidToken')
                );
            } elseif ($e instanceof TokenExpiredException) {
                return errorResponse(
                    Response::HTTP_UNAUTHORIZED,
                    ERROR_CODE['EXPIRED_TOKEN'],
                    t('auth.expiredToken')
                );
            } elseif ($e instanceof TokenBlacklistedException) {
                return errorResponse(
                    Response::HTTP_UNAUTHORIZED,
                    ERROR_CODE['BLACKLISTED_TOKEN'],
                    t('auth.blacklistedToken')
                );
            } else {
                return errorResponse(
                    Response::HTTP_UNAUTHORIZED,
                    ERROR_CODE['TOKEN_NOT_FOUND'],
                    t('auth.tokenNotFound')
                );
            }
        }
    }
}
