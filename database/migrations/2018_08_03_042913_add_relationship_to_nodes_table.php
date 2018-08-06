<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nodes', function (Blueprint $table) {
            
            $table->unsignedInteger('idFather')->after('biography')->nullable();
            $table->foreign('idFather')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            $table->unsignedInteger('idMother')->after('idFather')->nullable();
            $table->foreign('idMother')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            $table->unsignedInteger('realUser')->after('idMother')->nullable();
            $table->foreign('realUser')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->unsignedInteger('idTree')->after('realUser');
            $table->foreign('idTree')
                  ->references('id')->on('trees')
                  ->onDelete('cascade');

            $table->integer('level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nodes', function (Blueprint $table) {
            //
        });
    }
}
