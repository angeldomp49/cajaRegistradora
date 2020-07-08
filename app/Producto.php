<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //configuracion
    
    protected $table = 'productos';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    //atributos 
    protected $fillable = ['nombre','stock','precio',];

    public function ordenes(){
        return $this->belongsToMany('App\Orden');
    }
}
