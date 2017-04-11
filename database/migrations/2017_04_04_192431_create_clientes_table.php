<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateClientesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('clientes',function(Blueprint $table){
            $table->increments("id");
            $table->string("cli_cod");
            $table->string("cli_rut")->nullable();
            $table->string("cli_dig")->nullable();
            $table->string("cli_nom")->nullable();
            $table->string("cli_dir")->nullable();
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
        Schema::drop('clientes');
    }

}