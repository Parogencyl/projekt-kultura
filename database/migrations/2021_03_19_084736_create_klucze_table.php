<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKluczeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klucze', function (Blueprint $table) {
            $table->id();
            $table->string('osoba');
            $table->string('email');
            $table->string('kurs');
            $table->integer('wariant');
            $table->string('klucz');
            $table->string('zamowienie');
            $table->timestamp('utworzone')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klucze');
    }
}
