<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
             $table->char('NIS',4)->unique();
            $table->integer('id_user')->unsigned();
            $table->string('no_guru',20);
            $table->string('nama',40);
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('kelas', ['X', 'XI', 'XII']);
            $table->string('alamat',100);
            $table->string('noHp',12);
            $table->string('namaIbu',40);

            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::drop('siswa');
    }
}
