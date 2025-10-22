<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Permiso extends Model
{

    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'tbl_permisos';

    protected $primaryKey = 'iid';

    protected $keyType = 'integer';


    protected $fillable = 
    [

        'txtnombre',
        'txtdescripcion',
        'iidmodulo',
        'bactivo',
        'txtclave'
    ];

    protected $casts = 
    [
        'bactivo' => 'boolean'
    ];


    public function modulo():BelongsTo{

        return $this->belongsTo(Modulo::class, 'iidmodulo');
    }

    public function roles(): BelongsToMany{

        return $this->belongsToMany(Rol::class, 'tbl_rol_permisos', 'iidrol', 'iidpermiso')->withPivot('iid');

    }













    
}
