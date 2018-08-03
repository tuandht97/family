<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listNodes', function (Blueprint $table) {
            $table->increments('id');

            //ID tree
            $table->unsignedInteger('idTree');
            $table->foreign('idTree')
                  ->references('id')->on('trees')
                  ->onDelete('cascade');

            //ID node
            $table->unsignedInteger('idNode');
            $table->foreign('idNode')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            $table->integer('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listNodes');
    }
}