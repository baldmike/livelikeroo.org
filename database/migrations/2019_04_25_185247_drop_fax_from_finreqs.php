<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFaxFromFinreqs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fin_reqs', function (Blueprint $table) {
            $table->dropColumn('primary_clinic_fax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fin_reqs', function (Blueprint $table) {
            $table->string('primary_clinic_fax');
        });
    }
}
