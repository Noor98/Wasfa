<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('summary',250);
            $table->text('details');
            $table->dateTime('publish_date')->nullable();
            $table->integer('category_id');
            $table->string('image',50)->nullable();
            $table->boolean('allowcomment');
            $table->boolean('status');
            $table->boolean('isdelete')->default(0);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('article');
    }
}
