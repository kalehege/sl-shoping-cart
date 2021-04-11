<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->primary(['order_id', 'product_id']);
            $table->integer('quantity');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
