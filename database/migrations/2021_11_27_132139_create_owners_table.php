<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();

            $table->string('dni', 15)->comment('Rut del propietario');
            $table->string('name', 255)->comment('Nombre del propietario');
            $table->string('fathers_surname', 255)->comment('Apellido paterno');
            $table->string('mothers_surname', 255)->comment('Apellido materno');
            $table->integer('phone')->comment('Telefono');
            $table->string('type_livingplace', 255)->comment('Tipo vivienda')->default('DEPARTAMENTO');
            $table->string('number')->comment('Numero del departamento');

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
        Schema::dropIfExists('owners');
    }
}
