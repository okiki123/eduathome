<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('notification_types')->insert([
            ['name' => 'tutor_created'],
            ['name' => 'parent_created'],
            ['name' => 'tutor_approved']
        ]);

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->longText('data');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('fired_by_admin')->nullable()->references('id')->on('admins');
            $table->foreignId('fired_by_user')->nullable()->references('id')->on('users');
            $table->timestamp('read_at', 0)->nullable();
            $table->timestamp('created_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_types');
        Schema::dropIfExists('notifications');
    }
}
