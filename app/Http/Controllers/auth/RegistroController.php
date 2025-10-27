<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\auth\RegistroRequest;
use App\Models\Permiso;
use App\Models\Usuario;
use App\Models\UsuarioRol;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{

    public function registro(RegistroRequest $request, $iiduser){

        try{

            $user = Usuario::with('roles.permisos')->find($iiduser);  

            $permission = 'CREUSER';

            $permission_user = $user->roles
            ->flatMap(fn($rol) => $rol->permisos)
            ->pluck('txtclave')
            ->unique();


            if(!$permission_user->contains($permission)){

                return response()->json([

                    'status' => false,
                    'message' => 'No tienes permisos para poder crear un nuevo usuario',
                    'code' => 401
                ],401);
            }


            $body = $request->validated();

            if($request->hasFile('txtavatar')){

                $file = $request->file('txtavatar');

                $route_save = time().'.'.$file->getClientOriginalExtension();

                $file->storeAs('perfiles', $route_save, 'public');

                $body['txtavatar'] = 'storage/perfiles/'.$route_save;
            }

            $body['txtpassword'] = Hash::make($body['txtpassword']);

            $new_user = Usuario::create([

                'txtnombre' => $body['txtnombre'],
                'txtapellido_paterno' => $body['txtapellido_paterno']??null,
                'txtapellido_materno' => $body['txtapellido_materno']??null,
                'txtemail' => $body['txtemail'],
                'txtpassword' => $body['txtpassword'],
                'txtavatar' => $body['txtavatar']??null,
                'enumsexo' => $body['enumsexo']??null,
                'iedad' => $body['iedad']??null,
                'bactivo' => true,
            ]);

            $roles =  $body['roles'];

            foreach($roles as $rol){

                UsuarioRol::create([
                    'iidrol' => $rol,
                    'iidusuario' => $new_user['iid'],
                    'bactivo' => true
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Usuario creado exitosamente',
                'data' => $new_user,
                'code' => 201
            ],201);

        }catch(\Exception $e){

            return InterceptorInternal::internalError($e);
        }
    }   



    
}



