<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyConvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_converts', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('client_type')->nullable();
            $table->string('operation_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('total')->nullable();
            $table->string('commission')->nullable();

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
        Schema::dropIfExists('currency_converts');
    }
}
