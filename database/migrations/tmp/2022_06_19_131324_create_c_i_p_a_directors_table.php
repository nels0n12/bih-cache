<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCIPADirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_i_p_a_directors', function (Blueprint $table) {
            $table->id();
            $table->string('Company_UIN');
            $table->string('FullNames')->nullable();
            $table->string('Address')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('Residential_Address')->nullable();
            $table->string('Postal_Address')->nullable();
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
        Schema::dropIfExists('c_i_p_a_directors');
    }
}
