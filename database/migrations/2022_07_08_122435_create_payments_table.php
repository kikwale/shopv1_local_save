<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('owner_id')->nullable();
            $table->string('shop_id');
            $table->string('year');
            $table->string('month');
            $table->date('date');
            $table->double('salary');
            $table->double('amount_paid');
            $table->string('payment_method');
            $table->string('method_name')->nullable();
            $table->string('number')->nullable();
            $table->unique(['shop_id','employee_id', 'month','year']);
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
        Schema::dropIfExists('payments');
    }
}
