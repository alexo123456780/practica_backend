<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class GuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = $request->bearerToken();

        if(!$token)
        {
            return response()->json([

                'status' => false,
                'message' => 'El token es necesario para realizar la accion',
                'code' => 401
            ],401);
        }    


        $personalacces_token = PersonalAccessToken::findToken($token);

        if(!$personalacces_token)
        {

            return response()->json([

                'status' => false,
                'message' => 'El token que ingreso no es valido intente de nuevo porfavor',
                'code' => 401
            ],401);
        }


        if($personalacces_token->expires_at && $personalacces_token->expires_at->isPast())
        {

            return response()->json([

                'status' => false,
                'message' => 'El token ha expirado o vencido, inicia sesion de nuevo porfavor',
                'code' => 401
            ],401);

        }

        return $next($request);
    }



}
