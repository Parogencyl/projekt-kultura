<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZespolyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zespoly', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->text('title1');
            $table->text('text1');
            $table->text('title2')->nullable();
            $table->text('text2')->nullable();
            $table->text('title3')->nullable();
            $table->text('text3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zespoly');
    }
}
