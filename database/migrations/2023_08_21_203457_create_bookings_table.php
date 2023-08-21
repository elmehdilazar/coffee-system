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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->date("date");
            $table->string("time");
            $table->string("phone");
            $table->text('message');
            //foreign key to users table
            $table->unsignedBigInteger('user_id'); //this is for foreign key and index
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
