<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalhafalanView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW totalhafalan AS select `hafalanziadah`.`NIS` 
            AS `nis`,month(`hafalanziadah`.`tanggal`) AS `bulan`,year(`hafalanziadah`.`tanggal`) 
            AS `tahun`,sum(`hafalanziadah`.`totalHalaman`) AS `totalHalaman` from `arrosyidah`.`hafalanziadah` 
            group by `hafalanziadah`.`NIS`,month(`hafalanziadah`.`tanggal`),year(`hafalanziadah`.`tanggal`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW totalhafalan' );
    }
}
