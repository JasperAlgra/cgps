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
            $table->bigIncrements('id');
            $table->string('IMEI');
            $table->dateTime('datetime');
            $table->string('switch')->nullable();
            $table->string('eventId')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('IO')->nullable();
            $table->binary('data');
            $table->binary('extra')->nullable();
            $table->timestamps();
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
