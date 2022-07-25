<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          
            $table->id();
            $table->string('name');
            $table->string('owner_id')->nullable();
            $table->string('shop_id');
            $table->string('category');//rejareja/jumla
            $table->string('unit');
            $table->float('quantity')->nullable();
            $table->float('total');
            $table->string('notification')->nullable();
            $table->string('money_unit')->nullable();
            $table->float('purchased_price');
            $table->float('sold_price');
            $table->date('expire')->nullable();//Tutaitoa isiwe null
            $table->string('location')->nullable();
            $table->boolean('isExpired')->default(false);//notified
            $table->string('description')->nullable();
            $table->date('date')->default(date('Y-m-d'));
            $table->string('year')->default(date('Y', strtotime(date('Y-m-d'))));
            $table->string('month')->default(date('M', strtotime(date('Y-m-d'))));
            $table->boolean('isTaxable')->default(false);
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
        Schema::dropIfExists('products');
    }
}
