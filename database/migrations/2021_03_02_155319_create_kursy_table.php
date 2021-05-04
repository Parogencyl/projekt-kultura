<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKursyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kursy', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->time('laczny_czas');
            $table->double('cena');
            $table->double('cena2');
            $table->double('cena3');
            $table->text('wariant1');
            $table->text('wariant2');
            $table->text('wariant3');
            $table->timestamp('aktualizacja')->useCurrent();
            $table->text('czego_sie_nauczysz');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursy');
    }
}
