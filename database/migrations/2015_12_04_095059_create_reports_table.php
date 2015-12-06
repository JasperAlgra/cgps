<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
//            $table->string('IMEI');
            // foreign key op devices
            $table->integer('device_id')->unsigned();
//            $table->foreign('device_id')->references('id')->on('devices')->change();
            $table->dateTime('datetime');
            $table->string('switch')->nullable();
            $table->string('eventId')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('IO')->nullable();
//            $table->binary('data');
//            $table->binary('extra')->nullable();
            $table->timestamps();

//            $table->index('data', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
