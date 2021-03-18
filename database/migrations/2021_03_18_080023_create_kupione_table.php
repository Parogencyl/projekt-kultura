<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKupioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kupione', function (Blueprint $table) {
            $table->id();
            $table->string('numer_zamowienia');
            $table->string('kurs');
            $table->integer('wariant');
            $table->double('cena');
            $table->string('email');
            $table->string('osoba');
            $table->string('telefon');
            $table->string('potwierdzenie_platnosci');
            $table->string('firma')->nullable();
            $table->string('nip')->nullable();
            $table->string('dane_firmy')->nullable();
            $table->string('czy_zaplacono');
            $table->timestamp('zakupione')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kupione');
    }
}
