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
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("prod_id");
            $table->foreign('prod_id')->references('id')->on('products')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger("order_id");
            $table->foreign('order_id')->references('id')->on('orders')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer("qte");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
