<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UsuarioRol extends Model
{

    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'tbl_usuario_roles';

    protected $primaryKey = 'iid';

    protected $keyType = 'integer';



    protected $fillable = 
    [
        'iidrol',
        'iidusuario',
        'bactivo'
    ];


    protected $casts = 
    [

        'bactivo' => 'boolean'

    ];



    
}
