<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCIPASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_i_p_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('UIN')->unique();
            $table->string('Company_Status')->nullable();
            $table->string('Foreign_Company')->nullable();
            $table->boolean('Exempt')->nullable();
            $table->date('Incorporation_Date')->nullable();
            $table->date('Re-Registration_Date')->nullable();
            $table->boolean('Have_own_constitution')->nullable();
            $table->string('Annual_Return_Filing_Month')->nullable();
            $table->date('Annual_Return_last_filed_on')->nullable();
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
        Schema::dropIfExists('c_i_p_a_s');
    }
}
