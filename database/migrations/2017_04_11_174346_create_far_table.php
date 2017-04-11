<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateFarTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('far',function(Blueprint $table){
            $table->increments("id");
            $table->integer("ots_id")->references("id")->on("ots")->nullable();
            $table->date("far_fec")->nullable();
            $table->decimal("far_ali", 15, 2)->nullable();
            $table->decimal("far_via", 15, 2)->nullable();
            $table->decimal("far_die", 15, 2)->nullable();
            $table->string("far_pea")->nullable();
            $table->decimal("far_loc", 15, 2)->nullable();
            $table->decimal("far_col", 15, 2)->nullable();
            $table->decimal("far_otro", 15, 2)->nullable();
            $table->decimal("far_desc", 15, 2)->nullable();
            $table->decimal("far_comb_efec", 15, 2)->nullable();
            $table->decimal("far_comb_cred", 15, 2)->nullable();
            $table->decimal("far_mon_asig", 15, 2)->nullable();
            $table->enum("far_cli_ot", ["Cliente", "OT"])->nullable();
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
        Schema::drop('far');
    }

}