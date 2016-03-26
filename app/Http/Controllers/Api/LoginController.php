<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Core\UserRepositoryEloquent;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    use ThrottlesLogins;

    protected $user;

    public function __construct(UserRepositoryEloquent $user){
        $this->user = $user;
    }

    public function postRegister(Request $request){
        return $this->user->create($request);
    }

    public function postLogin(Request $request){
        $credentials = $this->getCredentails($request);
        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentails'], 401);
            }
        }catch (JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        Session::set('token', $token);
        \Cookie::make('token', $token, 60);
        return response()->json(compact('token'));
    }

    private function getCredentails($request)
    {
        return $request->only('email', 'password');
    }
}
