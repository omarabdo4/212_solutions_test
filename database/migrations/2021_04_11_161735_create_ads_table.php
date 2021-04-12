<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->timestamp('date_from');
            $table->timestamp('date_to');
            $table->integer('duration');//in minutes
            $table->integer('frequency');//in minutes
            $table->unsignedBigInteger('views')->default(0);
            $table->foreignId('holder_id')->constrained('ad_holders');
            $table->boolean('published');
            $table->timestamp('last_done')->nullable();
            $table->timestamp('last_hold')->nullable();
            $table->timestamp('last_processed')->nullable();
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
        Schema::table('ads',function (Blueprint $table){
            $table->dropForeign(['holder_id']);
        });
        Schema::dropIfExists('ads');
    }
}
