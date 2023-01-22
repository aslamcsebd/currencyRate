<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_rates', function (Blueprint $table) {
            $table->id();
            $table->string('client_type')->nullable();
            $table->string('operation_type')->nullable();
            $table->string('percentage')->nullable();
            $table->timestamps();
        });

        $rates =
            [
                [1, 'private', 'withdraw', '0.003'],
                [2, 'private', 'deposit', '0.0003'],
                [3, 'business', 'withdraw', '0.005'],
                [4, 'business', 'deposit', '0.0003']
            ];

        foreach($rates as $rate){
            DB::table('commission_rates')->insert([
                'client_type' => $rate[1],
                'operation_type' => $rate[2],
                'percentage' => $rate[3]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commission_rates');
    }
}
