<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchased__items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merchandise_id')->unsigned();
            $table->foreign('merchandise_id')->references('id')->on('merchandises');
            $table->bigInteger('purchase_id')->unsigned();
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->integer('whole_sale_qty');
            $table->integer('purchase_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchased__items');
    }
};
