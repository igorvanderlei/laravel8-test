<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
	        $table->bigInteger('departamento_id')->unsigned();
            $table->string('password');
            $table->string('profile_photo_url')->nullable();
            $table->rememberToken()->nullable();

            $table->foreign('departamento_id')->references('id')->on('departamentos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
