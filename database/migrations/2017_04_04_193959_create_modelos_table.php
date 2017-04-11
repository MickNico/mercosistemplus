<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateModelosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('modelos',function(Blueprint $table){
            $table->increments("id");
            $table->string("mod_cod")->nullable();
            $table->integer("clientes_id")->references("id")->on("clientes")->nullable();
            $table->string("mod_tip_cam")->nullable();
            $table->string("mod_mod")->nullable();
            $table->string("mod_mar")->nullable();
            $table->string("mod_rend")->nullable();
            $table->string("mod_cap_est")->nullable();
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
        Schema::drop('modelos');
    }

}