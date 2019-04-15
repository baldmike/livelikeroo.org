<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinreqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finreqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email');
            $table->string('address_1');
            $table->string('address_2')->nullable()->default(null);
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('pet_name');
            $table->string('species');
            $table->string('breed')->nullable()->default(null);
            $table->integer('age');
            $table->string('gender');
            $table->boolean('altered');
            $table->text('about');
            $table->string('image')->nullable()->default(null);
            $table->string('diagnosis')->nullable()->default(null);
            $table->date('diagnosis_date')->nullable()->default(null);
            $table->string('previous_diagnosis');
            $table->string('vet_first_name');
            $table->string('vet_last_name');
            $table->string('primary_clinic_name');
            $table->string('primary_clinic_phone');
            $table->string('primary_clinic_fax')->nullable()->default(null);
            $table->string('primary_clinic_email')->nullable()->default(null);
            $table->string('specialist')->nullable()->default(null);
            $table->string('other_help')->nullable()->default(null);
            $table->softDeletes();
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
        Schema::dropIfExists('finreqs');
    }
}
