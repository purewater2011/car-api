<?php

namespace App\Http\Middleware\Api;

use Closure;
use Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Middleware\BaseMiddleware;

class GetUserFromToken extends BaseMiddleware
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
        if (! $token = $this->auth->setRequest($request)->getToken() || !$token = Session::get('token') || !$token = \Cookie::get('token')) {
            return $this->respond('tymon.jwt.absent', 'token_not_provided', 400);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            try{
                $newToken = $this->auth->setRequest($request)->parseToken()->refresh();
                Session::set('token', $newToken);
                \Cookie::make('token', $newToken, 60);
                $user = $this->auth->authenticate($newToken);
            }catch (TokenExpiredException $exception){
                return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);
            } catch (JWTException $e) {
                return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);
            }
            /*try{
                $user = $this->auth->authenticate($newToken);
            }catch (TokenExpiredException $exception){
                return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);
            } catch (JWTException $e) {
                return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);
            }*/
        } catch (JWTException $e) {
            return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);
        }

        if (! $user) {
            return $this->respond('tymon.jwt.user_not_found', 'user_not_found', 404);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}
