<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('address');
            $table->float('price');
            $table->integer('rooms');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('branch_id');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->foreignId('status_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
