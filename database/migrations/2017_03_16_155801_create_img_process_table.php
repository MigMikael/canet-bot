<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area')->default(0);
            $table->timestamps();
        });

        $sql = 'ALTER TABLE `process_image` ADD `image` MEDIUMBLOB';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_image');
    }
}
