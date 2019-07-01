<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Donation;

class ChangeDonationTypeToBoolean extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (Donation::all() as $donation) {
                $donation->donation_type = false;
                $donation->save();
        }

        Schema::table('donations', function (Blueprint $table) {
            $table->boolean('donation_type')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            
        });
    }
}
