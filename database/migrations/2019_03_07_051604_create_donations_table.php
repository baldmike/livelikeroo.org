<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('name_on_card');
            $table->string('email');
            $table->string('donation_type')->nullable();
            $table->string('frequency');
            $table->string('honoree')->nullable()->default(null);
            $table->string('recipient_name')->nullable()->default(null);
            $table->string('recipient_email')->nullable()->default(null);
            $table->string('recipient_msg')->nullable()->default(null);

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
        Schema::dropIfExists('donations');
    }
}
