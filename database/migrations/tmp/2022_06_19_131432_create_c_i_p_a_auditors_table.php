<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCIPAAuditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_i_p_a_auditors', function (Blueprint $table) {
            $table->id();
            $table->string('Company_UIN');
            $table->string('Name')->nullable();
            $table->string('Country')->nullable();
            $table->string('Company_Name')->nullable();
            $table->string('UIN')->nullable();
            $table->string('Registered_Office_Address')->nullable();
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
        Schema::dropIfExists('c_i_p_a_auditors');
    }
}
