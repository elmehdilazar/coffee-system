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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double("total");
            $table->string("status",200)->default("processing");
            $table->string("first_name",200);
            $table->string("last_name",200);
            $table->text("address");
            $table->string("city",100);
            $table->string("zip_code",20);
            $table->string("phone",20);
            $table->string("email",200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
