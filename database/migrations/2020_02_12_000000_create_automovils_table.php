<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('placa')->unique();
            $table->text('marca');
            $table->text('modelo');
            $table->float('valor_comercial');
            $table->float('valor_alquiler');
            $table->text('disponible');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automovils');
    }
}
