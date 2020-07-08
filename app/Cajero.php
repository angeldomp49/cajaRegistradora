<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajero extends Model
{
    //configuracion
    
    protected $table = 'cajeros';
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
    //ocultos
    protected $hidden = [
        'password',
    ];

    public function ordenes(){
        return $this->hasMany('App\orden');
    }
}
