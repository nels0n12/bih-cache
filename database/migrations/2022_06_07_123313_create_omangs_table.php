<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('omangs', function (Blueprint $table) {
            $table->id();
            $table->string('ID_NO');
            $table->string('SURNME')->nullable();
            $table->string('FIRST_NME')->nullable();
            $table->string('SEX')->nullable();
            $table->date('BIRTH_DTE')->nullable();
            $table->string('BIRTH_PLACE_NME')->nullable();
            $table->string('MARITAL_STATUS_DESCR');
            $table->string('SPOUSE_NME');
            $table->string('BIRTH_DTE_UNKNOWN');
            $table->string('OCCUPATION_CDE');
            $table->string('OCCUPATION_DESCR');
            $table->string('RESIDENTIAL_ADDR');
            $table->string('POSTAL_ADDR');
            $table->string('MARITAL_STATUS_CDE');
            $table->string('DISTRICT_CDE');
            $table->string('DISTRICT_NME');
            $table->string('APPLICATION_PLACE_CDE');
            $table->string('APPLICATION_PLACE_NME');
            $table->string('PERSON_STATUS');
            $table->string('APPLICATION_NO');
            $table->date('CHANGE_DTE');
            $table->date('EXPIRY_DTE');
            $table->date('DECEASED_DTE');
            $table->string('DECEASED_DTE_UNKNOWN');
            $table->string('DEATH_CERT_NO');
            $table->string('CITIZEN_STATUS_CDE');
            $table->string('CITIZEN_STATUS_DTE');
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
        Schema::dropIfExists('omangs');
    }
}
