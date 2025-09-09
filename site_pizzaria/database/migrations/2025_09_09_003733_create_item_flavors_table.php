<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemFlavorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_flavors', function (Blueprint $table) {
            $table->foreignId('item_id')->constrained('sale_items', 'item_id')->onDelete('cascade');
            $table->foreignId('flavor_id')->constrained('pizza_flavors', 'flavor_id')->onDelete('cascade');
            $table->decimal('proportion', 3, 2);
            $table->primary(['item_id', 'flavor_id']);
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
        Schema::dropIfExists('item_flavors');
    }
}
