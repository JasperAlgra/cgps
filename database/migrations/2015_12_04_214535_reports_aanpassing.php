<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsAanpassing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            // drop IMEI
//            $table->dropColumn('IMEI');

            // add device_id
//            $table->integer('device_id')->unsigned();

            // Unsigned
//            $table->bigIncrements('id')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
