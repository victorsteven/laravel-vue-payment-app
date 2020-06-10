<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFrequenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_frequencies', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('user_id', 36);
            $table->string('product_id', 36);
            $table->string('frequency', 100);
            $table->string("period");
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
        Schema::dropIfExists('product_frequencies');
    }
}
