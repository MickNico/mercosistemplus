<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePeajesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('peajes',function(Blueprint $table){
            $table->increments("id");
            $table->string("pea_pais")->nullable();
            $table->string("pea_ori")->nullable();
            $table->string("pea_des")->nullable();
            $table->enum("pea_cant_eje", ["1 Eje", "2 Eje", "3 Eje", "4 Eje", "5 Eje", "6 Eje", "7 Eje", "8 Eje", "9 Eje", "10 Eje", ])->nullable();
            $table->decimal("pea_val", 15, 2)->nullable();
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
        Schema::drop('peajes');
    }

}