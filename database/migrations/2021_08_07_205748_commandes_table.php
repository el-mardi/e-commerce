<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_cmd');
            $table->bigInteger('id_user')->unsigned()->index();
            $table->foreign('id_user')
                    ->references('id_user')
                    ->on('users')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
