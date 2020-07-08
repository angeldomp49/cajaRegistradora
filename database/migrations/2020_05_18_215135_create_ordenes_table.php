<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('email_facturacion',100);
            $table->double('total_pagar',8,2);
            $table->double('pago_recibido',8,2);
            $table->double('cambio',8,2);
            $table->dateTime('fecha',0);
            $table->string('cajero_nombre');
            $table->foreign('cajero_nombre')
                        ->reference('nombre')
                        ->on('cajeros')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}
