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
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',11)->nullable();
            $table->boolean('sex')->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace')->nullable();
            $table->boolean('is_alive')->nullable();
            $table->string('address')->nullable();
            $table->date('death_date')->nullable();
            $table->text('cause_of_death')->nullable();
            $table->string('burial_place')->nullable();
            $table->text('biography')->nullable();
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
