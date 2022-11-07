<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_amounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoices_id');
            $table->foreign('invoices_id')
            ->references('id')
            ->on('invoices')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('owner_id')->nullable();
            $table->string('shop_id');
            $table->string('amount');
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
        Schema::dropIfExists('invoice_amounts');
    }
}
