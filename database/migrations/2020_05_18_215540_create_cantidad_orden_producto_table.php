<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantidadOrdenProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidad_orden_producto', function (Blueprint $table) {
            $table->string('producto_nombre');
            $table->foreign('producto_nombre')
                        ->reference('nombre')
                        ->on('productos')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->unsignedBigInteger('orden_id');
            $table->foreign('orden_id')
                        ->reference('id')
                        ->on('ordenes')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->decimal('cantidad_producto',4,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cantidad_orden_producto');
    }
}
