<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCIPAAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_i_p_a_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('Company_UIN');
            $table->string('Registered_Office_Address')->nullable();
            $table->string('Postal_Address')->nullable();
            $table->string('Principal_Place_of_Business')->nullable();
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
        Schema::dropIfExists('c_i_p_a_addresses');
    }
}
