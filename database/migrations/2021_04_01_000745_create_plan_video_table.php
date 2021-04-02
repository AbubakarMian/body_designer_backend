<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->nullable()->default(0);
            $table->bigInteger('video_id')->nullable()->default(0);
            $table->integer('week_num')->nullable()->default(0);
            $table->integer('day_num')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_video');
    }
}
