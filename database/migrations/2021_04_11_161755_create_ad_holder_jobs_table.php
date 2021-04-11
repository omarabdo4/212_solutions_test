<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdHolderJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_holder_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('stage'); // 0 is processing - 1 is hold - 2 is done
            $table->foreignId('holder_id')->constrained('ad_holders');
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
        Schema::table('ad_holder_jobs',function (Blueprint $table){
            $table->dropForeign(['holder_id','ad_id']);
        });
        Schema::dropIfExists('ad_holder_jobs');
    }
}
