<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nodes', function (Blueprint $table) {
            
            $table->unsignedInteger('idFather')->after('biography');
            $table->foreign('idFather')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            $table->unsignedInteger('idMother')->after('idFather');
            $table->foreign('idMother')
                  ->references('id')->on('nodes')
                  ->onDelete('cascade');

            $table->unsignedInteger('realUser')->after('idMother');
            $table->foreign('realUser')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
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
