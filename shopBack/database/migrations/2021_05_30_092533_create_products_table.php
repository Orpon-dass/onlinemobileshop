<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('productName',100);
            $table->string('brandName',100);
            $table->string('categoryName',100);
            $table->float('productPrice',10,3);
            $table->integer('productQuantity');
            $table->tinyInteger('ProductDiscount');
            $table->string('productImageOne',150);
            $table->string('productImageTwo',150);
            $table->string('productImageThree',150);
            $table->string('productImageFour',150);
            $table->longText('productDescription');
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
        Schema::dropIfExists('products');
    }
}
