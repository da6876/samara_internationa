<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyContactUsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_contact_us_infos', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('contact_subject');
            $table->string('contact_msg');
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
        Schema::dropIfExists('my_contact_us_infos');
    }
}
