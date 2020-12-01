<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCaregiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caregivers', function (Blueprint $table) {
            $table->string('bio')->nullable()->after('telephone');
            $table->string('street1')->nullable()->after('bio');
            $table->string('street2')->nullable()->after('street1');
            $table->foreignId('state_id')->nullable()->after('street2')->constrained();
            $table->foreignId('city_id')->nullable()->after('state_id')->constrained('cities');
            $table->string('avatar_url')->nullable()->after('city_id');
            $table->string('resume_url')->nullable()->after('avatar_url');
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
            $table->dropForeign('caregivers_state_id_foreign');
            $table->dropForeign('caregivers_city_id_foreign');

            $table->dropColumn([
                'bio',
                'street1',
                'street2',
                'state_id',
                'city_id',
                'avatar_url',
                'resume_url'
            ]);
        });
    }
}
