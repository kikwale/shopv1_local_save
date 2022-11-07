<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanFromDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_from_details', function (Blueprint $table) {
            $table->id();
            $table->string('loan_foms_id');
            $table->string('owner_id')->nullable();
            $table->string('shop_id');
            $table->string('year');
            $table->string('month');
            $table->date('return_date');
            $table->string('Payment_method');
            $table->string('method_name')->nullable();
            $table->string('number')->nullable();
            $table->double('paid_amount');
            
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
        Schema::dropIfExists('loan_from_details');
    }
}
