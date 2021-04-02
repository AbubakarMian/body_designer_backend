<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('gender')->nullable()->default(0);
            $table->integer('goal_id')->nullable()->default(0);
            $table->integer('activity_level_id')->nullable()->default(0);
            $table->integer('plan_id')->nullable()->default(0);
            $table->string('height')->nullable()->default(null);
            $table->string('weight')->nullable()->default(null);
            $table->string('target_weight')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
