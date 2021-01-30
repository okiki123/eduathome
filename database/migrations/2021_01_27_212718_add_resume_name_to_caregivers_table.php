<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResumeNameToCaregiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caregivers', function (Blueprint $table) {
            $table->string('resume_name')->after('resume_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caregivers', function (Blueprint $table) {
            $table->dropColumn('resume_name');
        });
    }
}
