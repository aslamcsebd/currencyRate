<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_data', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('user_id');
            $table->string('client_type')->nullable();
            $table->float('amount', 8, 2);
            $table->string('operation_type')->nullable();
            $table->string('currency');
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
        Schema::dropIfExists('currency_data');
    }
}
