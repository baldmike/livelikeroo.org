<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFinreqsName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('finreqs', 'fin_reqs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           
    }
}
