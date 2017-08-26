<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            
            $table->string('no_guru',20)->unique();
            $table->integer('id_user')->unsigned();
            $table->string('nama',40);
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->string('alamat',100);
            $table->string('noHp',12);

            $table->foreign('id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guru');
    }
}
