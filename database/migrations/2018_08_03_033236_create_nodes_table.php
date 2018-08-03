<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('image');
            $table->string('email');
            $table->string('phone',11);
            $table->boolean('sex');
            $table->date('birthday');
            $table->string('birthplace');
            $table->boolean('is_alive');
            $table->string('address');
            $table->date('death_date');
            $table->text('cause_of_death');
            $table->string('burial_place');
            $table->text('biography');
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
        Schema::dropIfExists('nodes');
    }
}
