<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCIPASecretariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_i_p_a_secretaries', function (Blueprint $table) {
            $table->id();
            $table->string('Company_UIN');
            $table->string('Name')->nullable();
            $table->string('Address')->nullable();
            $table->string('Company_Name')->nullable();
            $table->string('UIN')->nullable();
            $table->string('Registered_Office_Address')->nullable();
            $table->string('Representative_Name')->nullable();
            $table->string('Representative_Postal_Address')->nullable();
            $table->date('Appointment_Date')->nullable();
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
        Schema::dropIfExists('c_i_p_a_secretaries');
    }
}
