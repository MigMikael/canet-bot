<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers_condition', function (Blueprint $table) {
            $table->increments('id');
            $table->float('temp');
            $table->string('weather');
            $table->float('pressure');
            $table->string('humidity');
            $table->float('humidity_sensor')->default(0);
            $table->string('date');
            $table->timestamps();
        });

        $sql = 'ALTER TABLE `weathers_condition` ADD `image` MEDIUMBLOB';
        DB ::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weathers_condition');
    }
}
