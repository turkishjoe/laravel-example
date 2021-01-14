<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->unique();
            $table->string('surname');
            $table->string('avatar_url');
            $table->string('phone');
            $table->boolean('sex');
            $table->boolean('notify_on_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname')->unique();
            $table->dropColumn('surname');
            $table->dropColumn('avatar_url');
            $table->dropColumn('phone');
            $table->dropColumn('sex');
            $table->dropColumn('notify_on_email');
        });
    }
}
