<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationship', function (Blueprint $table) {
            $table->increments('id');

            //From ID node
            $table->unsignedInteger('fromNode');
            $table->foreign('fromNode')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            //To ID node
            $table->unsignedInteger('toNode');
            $table->foreign('toNode')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            $table->tinyInteger('type');

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
        Schema::dropIfExists('relationship');
    }
}
