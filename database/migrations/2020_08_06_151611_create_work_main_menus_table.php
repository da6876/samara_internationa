<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkMainMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_main_menus', function (Blueprint $table) {
            $table->increments('work_main_menu_id');
            $table->string('work_main_menu_name');
            $table->string('work_main_menu_details');
            $table->string('work_main_menu_type');
            $table->string('work_main_menu_image');
            $table->string('work_main_menu_status');
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
        Schema::dropIfExists('work_main_menus');
    }
}
