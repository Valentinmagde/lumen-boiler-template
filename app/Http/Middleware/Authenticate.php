<?php
// phpcs:disable Squiz.Commenting.FunctionComment.TypeHintMissing
namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Auth  $auth The Auth instance.
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request Request.
     * @param  \Closure  $next Next.
     * @param  string|null  $guard Guard.
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            return response('Unauthorized', 401);
        }

        return $next($request);
    }
}
