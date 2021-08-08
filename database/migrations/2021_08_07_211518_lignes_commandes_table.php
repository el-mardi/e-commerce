<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LignesCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes_commandes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_lg_cmd');
            $table->bigInteger('id_cmd')->unsigned()->index();
            $table->foreign('id_cmd')
                    ->references('id_cmd')
                    ->on('commandes')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->bigInteger('id_prd')->unsigned()->index();
            $table->foreign('id_prd')
                    ->references('id_prd')
                    ->on('produits')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->float('prix');
            $table->integer('quantite');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lignes_commandes');
    }
}
