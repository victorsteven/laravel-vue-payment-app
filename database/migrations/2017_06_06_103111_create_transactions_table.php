<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('user_id', 36);
            $table->string('product_id', 36);
            $table->double('amount', 12, 2);
            // $table->enum('status', ['pending', 'failed', 'success']);
            $table->string('status', 20);
            $table->text('data')->nullable();
            $table->string('refrence_code', 20);
            $table->string('flw_reference', 100)->nullable();
            $table->string('authorization_code', 100)->nullable();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
