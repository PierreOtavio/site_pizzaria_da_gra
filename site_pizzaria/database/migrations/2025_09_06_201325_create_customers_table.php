<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 45)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('password'); // <- campo para senha
            $table->rememberToken();    // <- campo para remember_token ("remember_token" varchar(100) nullable)
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
        Schema::dropIfExists('customers');
    }
}
