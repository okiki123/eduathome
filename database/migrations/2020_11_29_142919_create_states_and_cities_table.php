<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatesAndCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->string('state_code');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('state_code')->references('state_code')->on('states');
        });

        DB::unprepared(file_get_contents('database/queries/states.sql'));
        DB::unprepared(file_get_contents('database/queries/cities.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
    }
}
