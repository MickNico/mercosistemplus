<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateEspecialesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('especiales',function(Blueprint $table){
            $table->increments("id");
            $table->string("esp_cod")->nullable();
            $table->integer("clientes_id")->references("id")->on("clientes")->nullable();
            $table->enum("esp_tipo", ["Semi Remolque", "Semi Remolque / 1ra Remonta", "Semi Remolque / 2da Remonta", "Semi Remolque / 3ra Remonta", "1ra Remonta", "2da Remonta", "3ra Remonta", ])->nullable();
            $table->decimal("esp_val", 15, 2)->nullable();
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
        Schema::drop('especiales');
    }

}