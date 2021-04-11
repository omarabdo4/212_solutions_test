<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_images', function (Blueprint $table) {
            $table->id();
            $table->string('original_filename');
            $table->string('extension');
            $table->string('path');
            $table->string('type');
            $table->foreignId('ad_id')->constrained('ads');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_images',function (Blueprint $table){
            $table->dropForeign(['ad_id']);
        });
        Schema::dropIfExists('ad_images');
    }
}
