<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCIPAShareholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_i_p_a_shareholders', function (Blueprint $table) {
            $table->id();
            $table->string('Company_UIN');
            $table->string('Name')->nullable();
            $table->string('Address')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('Residential_Address')->nullable();
            $table->string('Postal_Address')->nullable();
            $table->string('Nominee_shareholder')->nullable();
            $table->string('Appointment_Date')->nullable();
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
        Schema::dropIfExists('c_i_p_a_shareholders');
    }
}
