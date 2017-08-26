<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputhafalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputhafalan', function (Blueprint $table) {
            $table->increments('id_hafalan');
            $table->integer('noJuz');
            $table->char('NIS', 4);
            $table->string('no_guru', 20);
            $table->string('jenis', 20);
            $table->float('noHalamanA', 3, 1);
            $table->float('noHalamanB', 3, 1);
            $table->date('tanggal');
            $table->integer('nilai');
            $table->float('totalHalaman', 3, 1);

            $table->foreign('NIS')->references('NIS')->on('siswa');
            $table->foreign('no_guru')->references('no_guru')->on('guru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inputhafalan');
    }
}
