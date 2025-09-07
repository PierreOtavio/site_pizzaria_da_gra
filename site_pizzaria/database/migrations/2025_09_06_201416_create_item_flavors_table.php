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
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('flavor_id');
            $table->decimal('proportion', 3, 2)->nullable();

            $table->primary(['item_id', 'flavor_id']);

            $table->foreign('item_id')->references('item_id')->on('sale_items')->onDelete('cascade');
            $table->foreign('flavor_id')->references('flavor_id')->on('pizza_flavors')->onDelete('cascade');
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
