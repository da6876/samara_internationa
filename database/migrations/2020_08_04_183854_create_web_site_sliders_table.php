<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSiteSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_site_sliders', function (Blueprint $table) {
            $table->increments('slider_id');
            $table->string('slider_title');
            $table->string('slider_details');
            $table->string('slider_image');
            $table->string('slider_status');
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
        Schema::dropIfExists('web_site_sliders');
    }
}
