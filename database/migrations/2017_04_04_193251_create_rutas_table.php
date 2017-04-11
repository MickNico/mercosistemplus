<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateRutasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('rutas',function(Blueprint $table){
            $table->increments("id");
            $table->string("rut_cod")->nullable();
            $table->integer("clientes_id")->references("id")->on("clientes")->nullable();
            $table->string("rut_ori")->nullable();
            $table->string("rut_des")->nullable();
            $table->string("rut_kms")->nullable();
            $table->decimal("rut_val", 15, 2)->nullable();
            $table->decimal("rut_tip_camb", 15, 2)->nullable();
            $table->enum("rut_loc_pro_int", ["Local", "Provincia", "Internacional", ])->nullable();
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
        Schema::drop('rutas');
    }

}