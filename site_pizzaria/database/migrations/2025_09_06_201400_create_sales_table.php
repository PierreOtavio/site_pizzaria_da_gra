<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->unsignedInteger('customer_id');
            $table->dateTime('sale_date');
            $table->decimal('total_value', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->enum('payment_method', ['dinheiro', 'cartao', 'pix']); // ajuste para seus tipos!
            $table->decimal('addiction', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
