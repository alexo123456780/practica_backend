<?php

namespace App\Http\Controllers\auth;

use Exception;
use Illuminate\Http\JsonResponse;

class InterceptorInternal {


    public function __construct(){}


    public static function internalError(\Exception $e):JsonResponse{

        return response()->json([

            'status' => false,
            'message' => 'Internal Server Error',
            'warning' => $e->getMessage(),
            'code' => 500
        ],500);
    }






    


}



