<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHafalanziadahView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW hafalanziadah AS select `arrosyidah`.`inputhafalan`.`id_hafalan` 
            AS `id_hafalan`,`arrosyidah`.`inputhafalan`.`noJuz` AS `noJuz`,`arrosyidah`.`inputhafalan`.`NIS` 
            AS `NIS`,`arrosyidah`.`inputhafalan`.`no_guru` AS `no_guru`,`arrosyidah`.`inputhafalan`.`jenis` 
            AS `jenis`,`arrosyidah`.`inputhafalan`.`noHalamanA` AS `noHalamanA`,`arrosyidah`.`inputhafalan`.`noHalamanB` 
            AS `noHalamanB`,`arrosyidah`.`inputhafalan`.`tanggal` AS `tanggal`,`arrosyidah`.`inputhafalan`.`nilai` 
            AS `nilai`,`arrosyidah`.`inputhafalan`.`totalHalaman` AS `totalHalaman` from `arrosyidah`.`inputhafalan` 
            where (`arrosyidah`.`inputhafalan`.`jenis` = "ziadah")');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW hafalanziadah' );
    }
}
