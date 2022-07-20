<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanFomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_foms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner_id')->nullable();
            $table->string('shop_id');
            $table->double('loan_amount');
            $table->string('year');
            $table->string('month');
            $table->date('date');
            $table->date('final_date');
            $table->double('instalment_payment');
            $table->double('balance');
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
        Schema::dropIfExists('loan_foms');
    }
}
