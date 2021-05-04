<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarsztatyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warsztaty', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->text('text');
            $table->integer('czy_sprzedac')->default(0);
            $table->double('cena')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warsztaty');
    }
}
