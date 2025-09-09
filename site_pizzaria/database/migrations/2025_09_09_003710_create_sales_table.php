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
            $table->id('sale_id');
            $table->foreignId('customer_id')->constrained('customers', 'customer_id')->onDelete('cascade');
            $table->dateTime('sale_date');
            $table->decimal('total_value', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->enum('payment_method', ['dinheiro', 'cartao', 'pix']); // Adapte conforme seus métodos!
            $table->decimal('addiction', 10, 2)->default(0);
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
        Schema::dropIfExists('sales');
    }
}
