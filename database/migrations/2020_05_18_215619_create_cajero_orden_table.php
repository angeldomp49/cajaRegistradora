<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajeroOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajero_orden', function (Blueprint $table) {
            
            $table->unsignedBigInteger('orden_id');
            $table->foreign('orden_id')
                            ->reference('id')
                            ->on('ordenes')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');

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
        Schema::dropIfExists('cajero_orden');
    }
}
