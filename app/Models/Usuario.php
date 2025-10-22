<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'tbl_usuarios';

    protected $primaryKey = 'iid';

    protected $keyType = 'integer';


    protected $attributes = 
    [

        'txtapellido_paterno' => null,
        'txtapellido_materno' => null,
        'txtavatar' =>null,
        'enumsexo' => null,

    ];

    
    protected $fillable = 
    [
        'txtnombre',
        'txtapellido_paterno',
        'txtapellido_materno',
        'txtemail',
        'txtpassword',
        'txtavatar',
        'enumsexo',
        'iedad',
        'bactivo'
    ];

    protected $hidden = 
    [
        'txtpassword'
    ];

    protected $casts = 
    [
        'bactivo' => 'boolean'
    ];

    public function getAuthPassword()
    {

        return $this->txtpassword;
        
    }


    

    public function roles(): BelongsToMany{

        return $this->belongsToMany(Rol::class, 'tbl_usuario_roles', 'iidrol', 'iidusuario')->withPivot('iid');
    
    }
    
}
