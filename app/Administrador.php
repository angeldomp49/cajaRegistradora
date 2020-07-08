<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    

    //atributos 
    protected $fillable = [
        'nombre',
        'password',
        'email_contacto',
    ];
    protected $hidden = [
        'password',
    ];

}
