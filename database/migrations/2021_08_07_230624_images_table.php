<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_img');
            $table->string('url');
            $table->string('nom');
            $table->bigInteger('id_prd')->unsigned()->index();
            $table->foreign('id_prd')
                    ->references('id_prd')
                    ->on('produits')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
