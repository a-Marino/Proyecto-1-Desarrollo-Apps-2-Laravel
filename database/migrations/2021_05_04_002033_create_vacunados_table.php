<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacunadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunados', function (Blueprint $table) {
            $table->id();
            $table->integer('DNI')->unique();
            $table->text('apelnom');
            $table->text('domicilio');
            $table->integer('edad');
            $table->integer('grupo_riesgo');
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
        Schema::dropIfExists('vacunados');
    }
}
