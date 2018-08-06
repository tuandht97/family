<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('desciption')->nullable();
            $table->integer('amount')->nullable();

            // cụ tổ
            $table->unsignedInteger('ancestor')->nullable();
            $table->foreign('ancestor')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            //trưởng họ
            $table->unsignedInteger('patriarch')->nullable();
            $table->foreign('patriarch')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            //người tạo
            $table->unsignedInteger('creator');
            $table->foreign('creator')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('trees');
    }
}
