<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Rol extends Model
{

    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'tbl_roles';

    protected $primaryKey = 'iid';

    protected $keyType = 'integer';


    protected $fillable = 
    [
        'txtnombre',
        'txtdescripcion',
        'bactivo'
    ];

    protected $casts = 
    [
        'bactivo' => 'boolean',

    ];

    public function usuarios():BelongsToMany{

        return $this->belongsToMany(Usuario::class,'tbl_usuario_roles' , 'iidrol', 'iidusuario')->withPivot('iid');

    }

    public function permisos():BelongsToMany{

        return $this->belongsToMany(Permiso::class,'tbl_rol_permisos', 'iidrol', 'iidpermiso')->withPivot('iid');

    }

    
}
