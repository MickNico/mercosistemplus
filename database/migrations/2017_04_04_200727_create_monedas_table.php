<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateMonedasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('monedas',function(Blueprint $table){
            $table->increments("id");
            $table->enum("mon_cod", ["USD (Dolar Americano)", "ARS (Peso Argentino)", "BOB (Peso Boliviano)", "BRL (Real Brasileño)", "CLP (Peso Chileno)", "PEN (nuevo sol Peruano)", "UYU (peso uruguayo)", ])->nullable();
            $table->string("mon_pais")->nullable();
            $table->decimal("mon_val", 15, 2)->nullable();
            $table->date("mon_fech")->nullable();
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
        Schema::drop('monedas');
    }

}