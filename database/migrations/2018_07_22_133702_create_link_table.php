<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->string('url',100);
            $table->string('icon',100);
            $table->integer('parent_id');
            $table->boolean('show_in_menu');
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
        Schema::dropIfExists('link');
    }
}
