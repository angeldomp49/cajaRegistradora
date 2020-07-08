<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    //configuracion

    protected $table = 'ordenes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'unsignedBigInteger';
    public $timestamps = false;

    //atributos 
    protected $fillable = [
        'email_facturacion',
        'total_pagar',
        'pago_recibido',
        'cambio',
        'fecha',
        'cajero_nombre',
    ];

    //Recuperacion de todos los productos en la bdd

    public function listarCantidadesProductos($ordenId){
        return App\CantidadOrdenProducto::where('orden_id',$id);
    }
    public function listarPreciosProductos($id){
        $nombresProductos = App\CantidadOrdenProducto::where('orden_id',$id)->value('producto_nombre');
        $preciosProductos = [];
        foreach($nombresProductos as $nombreProducto){
            $precio = App\Producto::where('nombre', $nombreProducto)->first();
            $precioProducto[] = [$precio => $nombreProducto];
        }
        return $precioProductos;
    }
    public function sumarTotal($preciosProductos){
        $total = 0;
        $precios = array_values($preciosProductos);

        foreach($precios as $precio){
            $total += $precio;
        }
        return $total;
    }
    public function calcularCambio($recibido, $total){
        return $recibido - $total;
    }
    
    public function cajero(){
        return $this->belongsTo('App\cajero');
    }

    public function productos(){
        return $this->belongsToMany('App\Producto');
    }
}
