<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonaCategoriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula');
            $table->string('tipoempleado');
            $table->string('acad_prog');
            $table->string('cargo');
            $table->string('campus');
            $table->string('nombres');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('persona_categorias');
    }
}
