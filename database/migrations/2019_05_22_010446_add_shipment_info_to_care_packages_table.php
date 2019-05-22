<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShipmentInfoToCarePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('care_packages', function (Blueprint $table) {
            $table->string('shipping_id')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('tracking_url_provider')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('care_packages', function (Blueprint $table) {
            $table->dropColumn('shipping_id');
            $table->dropColumn('tracking_number');
            $table->dropColumn('tracking_url_provider');
        });
    }
}
