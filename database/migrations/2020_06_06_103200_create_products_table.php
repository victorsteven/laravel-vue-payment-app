<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->string('id', 36);
          $table->string('user_id', 36);
          $table->string('title', 191);
          $table->string('slug', 200)->unique();
          $table->text('description');
          $table->double('price', 12, 2);
          $table->string('image_path', 256);
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
        Schema::dropIfExists('products');
    }
}
