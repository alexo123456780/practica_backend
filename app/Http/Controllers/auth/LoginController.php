<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Controllers\auth\InterceptorInternal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(LoginRequest $credenciales){

        try{

           $body =  $credenciales->validated();

            $map = 
            [
                'txtemail' => $body['txtemail'],
                'password' => $body['txtpassword'],

            ];


            if(!Auth::attempt($map))
            {
                return response()->json([

                    'status' => false,
                    'message' => 'Credenciales incorrectas o cree una cuenta porfavor',
                    'code' => 401
                ],401);
            }

            $user = Auth::user();

            $expiration = Carbon::now()->addMinutes(1440);

            $token = $user->createToken('authToken', ['*']  , $expiration )->plainTextToken;

            return response()->json([

                'status' => true,
                'message' => 'Login exitoso',
                'data' => $user,
                'token' => $token,
                'expires_at' => $expiration,
                'code' => 200
            ],200);


        }catch(\Exception $e){

            return InterceptorInternal::internalError($e);
        }
    }

}
