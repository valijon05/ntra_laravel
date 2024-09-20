<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ads_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id');
            $table->string('name');
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('ads_images');
    }
};
