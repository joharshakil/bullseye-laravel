<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('em_id')->references('id')->on('em_service')->onDelete('cascade');
            $table->integer('gpr_id')->references('id')->on('gpr_service')->onDelete('cascade');
            $table->integer('cement_id')->references('id')->on('cement_service')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
