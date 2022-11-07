<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_product_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_models_id');
            $table->foreign('quotation_models_id')
            ->references('id')
            ->on('quotation_models')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('product_name');
            $table->string('price');
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
        Schema::dropIfExists('quotation_product_models');
    }
}
