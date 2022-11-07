<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_models', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id')->nullable();
            $table->string('shop_id');
            $table->string('date');
            $table->string('customer_name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->boolean('isPublished')->default(false);
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
        Schema::dropIfExists('quotation_models');
    }
}
