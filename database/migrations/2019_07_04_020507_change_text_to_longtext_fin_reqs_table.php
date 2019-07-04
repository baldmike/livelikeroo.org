<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTextToLongtextFinReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fin_reqs', function (Blueprint $table) {
            $table->longText('about')->change();
            $table->longText('specialist')->nullable()->default(null)->change();
            $table->longText('other_help')->nullable()->default(null)->change();
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
            $table->text('about')->change();
            $table->string('specialist')->nullable()->default(null)->change();
            $table->string('other_help')->nullable()->default(null)->change();
        });
    }
}
