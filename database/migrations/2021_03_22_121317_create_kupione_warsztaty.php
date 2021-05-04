<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKupioneWarsztaty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kupione_warsztaty', function (Blueprint $table) {
            $table->id();
            $table->string('numer_zamowienia');
            $table->string('warsztat');
            $table->double('cena');
            $table->string('email');
            $table->string('osoba');
            $table->string('telefon');
            $table->string('czy_zaplacono');
            $table->string('id_sesji');
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
        Schema::dropIfExists('kupione_warsztaty');
    }
}
