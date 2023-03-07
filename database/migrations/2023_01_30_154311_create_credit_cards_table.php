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
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->string('stripe_id')->nullable();
            $table->string('expire_month', 10)->nullable();
            $table->string('expire_year', 10)->nullable();
            $table->integer('pm_last_four')->unsigned()->nullable();
            $table->string('pm_type')->nullable();
            $table->string('country', 10)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('credit__cards');
    }
};
