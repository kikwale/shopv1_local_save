<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_tos', function (Blueprint $table) {
            $table->id();
            $table->string('seller_id');
            $table->string('owner_id')->nullable();
            $table->string('shop_id');
            $table->double('loan_amount');
            $table->string('year');
            $table->string('month');
            $table->date('date');
            $table->string('payment_period');
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
        Schema::dropIfExists('loan_tos');
    }
}
