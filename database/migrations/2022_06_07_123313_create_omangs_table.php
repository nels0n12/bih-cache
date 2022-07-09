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
            $table->string('ID_NO')->unique();
            $table->string('SURNME')->nullable();
            $table->string('FIRST_NME')->nullable();
            $table->string('SEX')->nullable();
            $table->date('BIRTH_DTE')->nullable();
            $table->string('BIRTH_PLACE_NME')->nullable();
            $table->string('MARITAL_STATUS_DESCR')->nullable();
            $table->string('SPOUSE_NME')->nullable();
            $table->string('BIRTH_DTE_UNKNOWN')->nullable();
            $table->string('OCCUPATION_CDE')->nullable();
            $table->string('OCCUPATION_DESCR')->nullable();
            $table->string('RESIDENTIAL_ADDR')->nullable();
            $table->string('POSTAL_ADDR')->nullable();
            $table->string('MARITAL_STATUS_CDE')->nullable();
            $table->string('DISTRICT_CDE')->nullable();
            $table->string('DISTRICT_NME')->nullable();
            $table->string('APPLICATION_PLACE_CDE')->nullable();
            $table->string('APPLICATION_PLACE_NME')->nullable();
            $table->string('PERSON_STATUS')->nullable();
            $table->string('APPLICATION_NO')->nullable();
            $table->date('CHANGE_DTE')->nullable();
            $table->date('EXPIRY_DTE')->nullable();
            $table->date('DECEASED_DTE')->nullable();
            $table->string('DECEASED_DTE_UNKNOWN')->nullable();
            $table->string('DEATH_CERT_NO')->nullable();
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
