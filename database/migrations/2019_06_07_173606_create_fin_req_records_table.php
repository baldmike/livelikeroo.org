<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinReqRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_req_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fin_req_id')->unsigned();
            $table->foreign('fin_req_id')->references('id')->on('fin_reqs');
            $table->string('filename');
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
        Schema::dropIfExists('fin_req_records');
    }
}
