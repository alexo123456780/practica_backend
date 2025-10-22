<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    public function registro(Request $body){

        try{

            $body->validate([

                'txtnombre' => 'required|string|max:255',
                'txtapellido_paterno' => 'string|nullable',
                'txtapellido_materno' =>  'string|nullable',
                'txtemail' => 'required|string|email',
                'txtpassword' => 'required|string|min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[_W/])(?=.*[\d]).+$/',
                'txtavatar' => 'file|mimes:png,jpg,jpeg|nullable',
                

            ]);




        }catch(\Exception $e){


        }




    }





    
}
