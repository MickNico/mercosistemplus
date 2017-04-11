<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateConductoresTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('conductores',function(Blueprint $table){
            $table->increments("id");
            $table->string("cond_nom")->nullable();
            $table->string("cond_rut")->nullable();
            $table->string("cond_lic")->nullable();
            $table->string("cond_var")->nullable();
            $table->string("cond_tip")->nullable();
            $table->date("cond_fec_venc")->nullable();
            $table->string("cond_foto")->nullable();
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
        Schema::drop('conductores');
    }

}