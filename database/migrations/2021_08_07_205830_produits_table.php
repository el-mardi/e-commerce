<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_prd');
            $table->bigInteger('id_ctg')->unsigned()->index();
            $table->foreign('id_ctg')
                    ->references('id_ctg')
                    ->on('categories')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->string('nom');
            $table->float('prix');
            $table->integer('quantite');
            $table->string('description');
            $table->bigInteger('id_rem')->unsigned()->index();
            $table->foreign('id_rem')
                    ->references('id_rem')
                    ->on('remises')
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
        Schema::dropIfExists('produits');
    }
}
