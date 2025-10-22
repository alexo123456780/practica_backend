<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Modulo extends Model
{

    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'tbl_modulos';

    protected $primaryKey = 'iid';

    protected $keyType = 'integer';

    protected $fillable = 
    [
        'txtnombre',
        'txtdescripcion',
        'txticono', 
        'bactivo',
        'roles'
    ];

    protected $casts = 
    [
        'bactivo' => 'boolean',
        'roles' => 'array'
    ];


    public function roles(): BelongsToMany{

        return $this->belongsToMany(Rol::class,'tbl_modulo_roles', 'iidmodulo', 'iidrol')->withPivot('iid');

    }

    public function permisos():HasMany{

        return $this->hasMany(Permiso::class,'iidmodulo');


    }

    
}
