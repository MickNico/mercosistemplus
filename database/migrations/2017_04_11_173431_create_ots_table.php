<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateOtsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('ots',function(Blueprint $table){
            $table->increments("id");
            $table->string("ots_not")->nullable();
            $table->string("ots_hes")->nullable();
            $table->integer("clientes_id")->references("id")->on("clientes")->nullable();
            $table->string("ots_ori")->nullable();
            $table->string("ots_des")->nullable();
            $table->string("ots_npe")->nullable();
            $table->string("ots_mod")->nullable();
            $table->string("ots_cha")->nullable();
            $table->string("ots_pat")->nullable();
            $table->string("ots_esp")->nullable();
            $table->enum("ots_tip_cam", ["Nuevo", "Usado"])->nullable();
            $table->string("ots_kms")->nullable();
            $table->string("ots_nota")->nullable();
            $table->string("ots_obs")->nullable();
            $table->integer("conductores_id")->references("id")->on("conductores")->nullable();
            $table->string("ots_lic")->nullable();
            $table->string("ots_gui")->nullable();
            $table->decimal("ots_val_fin", 15, 2)->nullable();
            $table->decimal("ots_val_rut", 15, 2)->nullable();
            $table->string("ots_val_esp")->nullable();
            $table->string("ots_adic")->nullable();
            $table->string("ots_mon_asig")->nullable();
            $table->string("ots_usr")->nullable();
            $table->string("ots_fact")->nullable();
            $table->decimal("ots_tip_camb", 15, 2)->nullable();
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
        Schema::drop('ots');
    }

}