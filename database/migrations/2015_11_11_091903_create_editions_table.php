<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('release_date');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('featured_img')->nullable();
            $table->string('online')->nullable();
            $table->string('pdf')->nullable();
            $table->boolean('featured');
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
        Schema::drop('editions');
    }
}
