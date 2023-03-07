<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->text('product_link')->nullable();
            $table->text('product_description')->nullable();
            $table->string('product_quantity', 100)->nullable();
            $table->string('product_price', 5, 2)->nullable()->default(0.00);
            $table->decimal('product_weigth', 5, 2)->nullable()->default(0.00);
            $table->boolean('product_weigth_type',2)->nullable()->comment("1 kg, 2 lbs");
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('orderdetails');
    }
};
